<?php

namespace App\Repositories;


interface CommentRepositoryInterface
{
	/**
	 * @param $id
	 * @return Illuminate\Database\Eloquent\Model
	 */
	public function findComment($id);

	/**
	 * @param $request
	 * @param $id
	 * @return Illuminate\Database\Eloquent\Model
	 */
	public function updateComment($request,$id);


	/**
	 * @param $request
	 * @return Illuminate\Database\Eloquent\Model
	 */
	public function storeComment($request);


	/**
	 * @param $id
	 * @return Illuminate\Database\Eloquent\Model
	 */
	public function deleteComment($id);
}