<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'user_id',
    	'question_id',
    	'comment',
    	'delete_flag',
    ];


    /**
     * 質問のユーザ情報を取得
     *
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
