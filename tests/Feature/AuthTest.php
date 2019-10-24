<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    /**
     * ユーザーがログイン画面が表示できる
     * @test
     */
    public function userCanViewLogin()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }


    /**
     * 未ログインユーザがホーム画面にアクセスすると、ログイン画面へリダイレクトされる
     * @test
     */
    public function unauthenticatUserCannotViewHome()
    {
        $response = $this->get('/home')
        ->assertRedirect('/login');
    }


    /**
     * 認証ユーザがログインし、ホーム画面へリダイレクトされる
     * @test
     */
    public function unauthenticatUserCannotViewHome()
    {
        $response = $this->get('/home')
        ->assertRedirect('/login');
    }
}
