<?php

namespace App\Repositories;


interface CommentRepositoryInterface
{
	/**
	 * @param $request
	 * @return Illuminate\Database\Eloquent\Model
	 */
	public function storeComment($request);
}