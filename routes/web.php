<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//退会機能
Route::group(['middleware' => 'auth'], function () {
    Route::get('/unsubscribe', 'Auth\UnsubscribeController@showUnsubsribeForm');
    Route::post('/unsubscribe', 'Auth\UnsubscribeController@execUnsubscribe');
});

//トップ画面
Route::get('/', 'TopController@index')->name('top');

//質問投稿
Route::get('/questions/getShain', 'QuestionsController@getShain');
Route::get('/questions/dialog', 'QuestionsController@dialogForm');
Route::get('/questions/new', 'QuestionsController@new')->name('questions.new');
Route::get('/questions/{id}', 'QuestionsController@show');
Route::post('/questions/store', 'QuestionsController@store');

//コメント投稿
Route::get('/comments/edit/{id}', 'CommentsController@edit');
Route::patch('/comments/{id}', 'CommentsController@update');
Route::post('/comments/store', 'CommentsController@store');
Route::delete('/comments/{id}', 'CommentsController@destroy');
