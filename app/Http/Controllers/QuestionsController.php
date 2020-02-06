<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use App\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\QuestionService;
use App\Repositories\QuestionRepositoryInterface;


/**
 * [区分]名称 
 *
 * 投稿される質問に関するコントローラーです
 *
 * @category Question
 * @package Controller
 */
class QuestionsController extends Controller
{

    /**
     * @var 質問サービス層を格納する変数
     */
    private $questionService;


    /**
     * 初期設定を行います
     *
     * @param App\Services\QuestionService $questionService 質問サービス層
     * @return void
     */
    public function __construct(QuestionService $questionService)
    {

        $this->questionService = $questionService;
    }


    /**
     * 質問の詳細画面を表示します
     *
     * @return Response
     */
    public function show($id)
    {
        //質問モデル取得
        $question = $this->questionService->findQuestion($id);
        return view('questions.show', compact('question'));
    }


    /**
     * 質問の投稿画面を表示します
     *
     * @return Response
     */
    public function new()
    {
        //カテゴリー取得
        $categories = Category::all();
        //ビューを返す
        Log::info('QuestionsController:new 投稿画面を表示します');
        return view('questions.new', compact('categories', $categories));
    }


    /**
     * 質問の投稿を保存します
     *
     * @return Response
     */
    public function store(QuestionRequest $request)
    {
        //登録処理 
        $result = $this->questionService->store($request);

        //失敗時の処理
        if (!$result) {
            return redirect('/home')->with('システムエラー。しばらくしてからやり直してください。');
        }

        //ログ書き込み
        Log::info('QuestionsController:store 投稿保存しました');

        return redirect('/home')->with('flash_message', '投稿が完了しました');
    }

    public function dialogForm()
    {
        return view('questions.kekkin');
    }

    public function getShain(Request $request)
    {
        if ($request->kbn == 1) {
            $data = array(
                [
                    'id' => '11111',
                    'name' => '中村健二',
                    'busyo' => '情報システム'
                ],
                [
                    'id' => '11112',
                    'name' => '青空太郎',
                    'busyo' => '総務課'
                ]
            );
        } else {
            $data = array(
                [
                    'id' => '11111',
                    'name' => '中村健二',
                    'busyo' => '情報システム'
                ],
            );
        }
        return json_encode($data);
    }
}
