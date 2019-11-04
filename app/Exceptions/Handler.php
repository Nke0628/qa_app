<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }


    /**
    * HttpExeceptionの場合に、アプリケーション独自のエラー画面を表示する
    *
    * @param  \Symfony\Component\HttpKernel\Exception\HttpException $e
    * @return \Illuminate\Http\Response
    */
    protected function renderHttpException(HttpException $e)
    {
        $status_code = $e->getStatusCode();

        switch ($status_code) {
            case 400:
                $message = 'Bad Request';
                break;
            case 401:
                $message = '認証に失敗しました';
                break;
            case 403:
                $message = 'アクセス権がありません';
                break;
            case 404:
                $message = 'ページが見つかりませんでした。お探しのコンテンツは既に削除された場合があります。';
                break;
            case 408:
                $message = 'タイムアウトです';
                break;
            case 414:
                $message = 'リクエストURIが長すぎます';
                break;
            case 419:
                $message = '不正なリクエストです';
                break;
            case 500:
                $message = 'Internal Server Error';
                break;
            case 503:
                $message = 'Service Unavailable';
                break;
            default:
                $message = 'エラー';
                break;
        }

        //共通テンプレートを使用
        return response()->view("errors.common",
            [
                // VIEWに与える変数
                'exception'   => $e,
                'message'     => $message,
                'status_code' => $status_code,
            ],
            $status_code, // レスポンス自体のステータスコード
            $e->getHeaders()
        );
    }
}
