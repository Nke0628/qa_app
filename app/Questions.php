<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $fillable = [
        'user_path',
        'title',
        'content',
        'image_path',
        'delete_flag',
    ];


    /**
     * 質問のカテゴリーを取得
     *
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }


    /**
     * 質問のユーザ情報を取得
     *
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * 質問に投稿されたコメントを取得
     *
     */
    public function comments()
    {
        return $this->hasMany('App\Comment','question_id');
    }

}
