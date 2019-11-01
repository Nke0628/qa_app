<?php

namespace App\Repositories;


interface QuestionRepositoryInterface
{
	/**
	 * @param string $id
	 * @return Illuminate\Database\Eloquent\Model
	 */
	public function findQuestion($id);


	/**
	 * @param $request
	 * @return Illuminate\Database\Eloquent\Model
	 */
	public function storeQuestion($request);
}