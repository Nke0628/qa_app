<?php

namespace App\Repositories;


interface QuestionRepositoryInterface
{
	/**
	 * @param $request
	 * @return Illuminate\Database\Eloquent\Model
	 */
	public function storeQuestion($request);
}