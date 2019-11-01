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
     * コメントを保存します
     *
     * @param string $id
     * @return Illuminate\Database\Eloquent\Model
     */
    public function store($request)
    {
        return $this->commentRepo->storeComment($request);
    }


    /**
     * コメントを削除します
     *
     * @param string $id
     * @return boolean
     */
    public function destroy($request)
    {
        return $this->commentRepo->deleteComment($request);
    }
}    

