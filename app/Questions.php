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
}
