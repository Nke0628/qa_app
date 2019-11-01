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

//トップ画面
Route::get('/', 'TopController@index');

//質問投稿
Route::get('/questions/new', 'QuestionsController@new')->name('questions.new');
Route::get('/questions/{id}', 'QuestionsController@show');
Route::post('/questions/store', 'QuestionsController@store');

//コメント投稿
Route::post('/comments/store', 'CommentsController@store');
Route::delete('/comments/{id}', 'CommentsController@destroy');
