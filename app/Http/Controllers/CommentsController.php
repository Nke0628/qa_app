<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentService;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CommentRequest;


class CommentsController extends Controller
{
    /**
     * @var サービスクラスを格納する変数
     */
    private $commentService;


    /**
     * 初期設定を行います
     *
     * @param App\Services\QuestionService $questionService コメントサービスクラス
     * @return void
     */
    public function __construct(CommentService $commentService)
    {   
        $this->commentService = $commentService;
    }


    /**
     * コメントの編集画面を表示します
     *
     * @param string $id コメントid
     * @return Response
     */
    public function edit($id)
    {          
        //コメントモデル取得
        $comment = $this->commentService->find($id);
        return view('comments.edit',compact('comment'));
    }


    /**
     * コメントを編集します。
     *
     * @param CommentRequest $request リクエストフォーム
     * @param string $id コメントid
     * @return Response
     */
    public function update(CommentRequest $request, $id)
    {          
        //コメントモデル取得
        $comment = $this->commentService->update($request,$id);

        Log::info('正常終了。コメントを編集しました');

        return redirect('/questions/'.$comment->question_id)->with('flash_message', 'コメント編集しました');
    }


    /**
     * コメントを削除します
     *
     * @param string $id コメントid
     * @return Response
     */
    public function destroy($id)
    {
        //コメント削除
        $comment = $this->commentService->destroy($id);

        Log::info('正常終了。コメントを削除しました');

        return redirect('/questions/'.$comment->question_id)->with('flash_message', 'コメント削除しました');
    }


    /**
     * コメントの投稿を保存します
     *
     * @param 
     * @return Response
     */
    public function store(CommentRequest $request)
    {          
        //登録処理 
        $result = $this->commentService->store($request);
         
        //ログ書き込み
        Log::info('CommentController:store コメント保存しました');

        return redirect('/questions/'.$request->question_id)->with('flash_message', '投稿が完了しました');
    }

}
