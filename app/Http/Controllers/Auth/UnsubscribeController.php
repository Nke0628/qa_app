<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UnsubscribeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\User;


class UnsubscribeController extends Controller
{
	/**
	 * 退会画面の表示
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function showUnsubsribeForm()
    {
    	return view('auth.cancel');
    }


	/**
	 * 退会処理の実行
	 *
	 * @param App\Http\Requests\UnsubscribeRequest
	 * @return \Illuminate\Http\Response
	 */
    public function execUnsubscribe(UnsubscribeRequest $request)
    {
    	//ユーザ情報の取得
    	$user = User::find(Auth::id());

    	//delete_flagを1にし、ログアウトする
    	$user->delete_flag = '1';
    	$user->save();

    	//ログ
    	Log::info('退会完了');

        //ログアウト処理
        Auth::logout();
        return redirect('/');
    }
}
