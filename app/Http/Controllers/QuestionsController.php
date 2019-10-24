<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Log;

/**
 * 
 *
 * クラスの詳細
 * 出来るだけ細かく書いたほうがよいが、詳細な説明は各メソッドに任せる。
 * 全体での共通ルールとか仕様を書く。
 *
 * @category Question
 * @package Controller
 */
class QuestionsController extends Controller
{

	/**
	* 質問の投稿画面を表示します
	*
	* @return Response
	*/
    public function new()
    {
    	//カテゴリー取得
    	$categories = Category::all();

        //ログ書き込み
    	Log::info('QuestionsController:new 投稿画面を表示します');

        //ビューを返す
    	return view('questions.new',compact('categories',$categories));
    }



}
