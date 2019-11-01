<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use \Route;

class RequestLog
{
    /**resources)
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request instanceof Request){
            
            //リクエスト情報の取得
            $requestData = [];
            $requestData = $request->all();
            if(array_key_exists('password', $requestData)){
                $requestData['password'] = '●●●●●●●●●●●●'; 
            }
            
            //ログ格納情報の設定
            $data = [
                'user_id' => Auth::id() != '' ? Auth::id() : null,
                'ip' => $request->ip(),
                'method' => $request -> method(),
                'request' => $requestData,
            ];

            //ログ書き込み
            Log::info('リクエストURL:' . $request->path());
            Log::info('パラメータ情報:' . print_r($data,true));
        }
        
        return $next($request);
    }
}
