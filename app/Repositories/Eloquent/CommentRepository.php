<?php

namespace App\Repositories\Eloquent;

use App\Repositories\CommentRepositoryInterface;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class CommentRepository implements CommentRepositoryInterface
{
    /**
     * コメントを検索します
     *
     * @param $request
     * @return Illuminate\Database\Eloquent\Model
     */
    public function findComment($id)
    {
        $comment = Comment::findOrFail($id);
        return $comment;
    }


    /**
     * 投稿されたコメントを編集します。
     *
     * @param $request
     * @param $id
     * @return Illuminate\Database\Eloquent\Model
     */
    public function updateComment($request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->comment = $request->comment;
        $comment->save();

        return $comment;
    }


    /**
     * 投稿されたコメントを論理削除します。
     *
     * @param $request
     * @return Illuminate\Database\Eloquent\Model
     */
    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete_flag = '1';
        $comment->save();

        return $comment;
    }


    /**
     * 投稿されたコメントを保存します。
     *
	 * @param $request
	 * @return Illuminate\Database\Eloquent\Model
     */
    public function storeComment($request)
    {
        //トランザクション開始
        DB::beginTransaction();
        try{
            $comment = new Comment;
            $comment->user_id = Auth::id();
            $comment->question_id = $request->question_id;
            $comment->comment = $request->comment;
            $comment->save();

            //トランザクションコミット
            DB::commit();

            return $comment;

        }catch(\Exception $e){
            //エラー時にはロールバック
            DB::rollback();
            Log::critical($e->getMessage());
            return false;
        }
    }
}
