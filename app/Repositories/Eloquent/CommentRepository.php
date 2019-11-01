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
