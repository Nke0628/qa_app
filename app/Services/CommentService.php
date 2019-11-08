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
     * コメントを検索します
     *
     * @param string $id
     * @return Illuminate\Database\Eloquent\Model
     */
    public function find($id)
    {
        return $this->commentRepo->findComment($id);
    }

    /**
     * コメントを編集します
     *
     * @param string $id
     * @return Illuminate\Database\Eloquent\Model
     */
    public function update($request, $id)
    {
        return $this->commentRepo->updateComment($request, $id);
    }


    /**
     * コメントを保存します
     *
     * @param Request $request
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
     * @return Illuminate\Database\Eloquent\Model
     */
    public function destroy($id)
    {
        return $this->commentRepo->deleteComment($id);
    }
}    

