<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Support\Facades\Auth;

/**
 * [test] AuthTest
 *
 * ユーザ認証に関するテストを行います
 *
 * @category Question
 * @package Test
 */
class AuthTest extends TestCase
{
     use RefreshDatabase;

    /**
     * 
     * @test
     */
    public function ユーザーがログイン画面を表示できる()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }


    /**
     * 
     * @test
     */
    public function 未ログインユーザがホーム画面にアクセスするとログイン画面へリダイレクトされる()
    {
        $response = $this->get('/home')
        ->assertRedirect('/login');
    }


    /**
    *
    * @test
    */
    public function 未認証ユーザがログインしホーム画面へリダイレクトされる()
    {
        $user = factory(User::class)->create();
        
        //未認証状態の確認
        $this->assertFalse(Auth::check());

        //ログイン実行
        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => 'test1234',
        ]);

        //認証済み
        $this->assertTrue(Auth::check());

        //
        $response->assertRedirect('/home');
    }


    /**
    *
    * @test
    */
    public function 未登録ユーザはログインできない()
    {
        $user = factory(User::class)->create();

        $this->assertFalse(Auth::check());

        $response = $this->post('/login',[
            'email' => $user->email,
            'password' => 'test',
        ]);

        $this->assertFalse(Auth::check());
    }
}
