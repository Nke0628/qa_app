<?php

namespace App\Services;

use App\Repositories\CommentRepositoryInterface;

class CommentService
{
    private $commentRepo;

	public function __construct(CommentRepositoryInterface $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    /**
     * 指定された質問を検索し、返します。
     *
     * @param string $id
     * @return Illuminate\Database\Eloquent\Model
     */
    public function store($request)
    {
        return $this->commentRepo->storeComment($request);
    }
}    

