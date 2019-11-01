<?php

namespace App\Services;

use App\Repositories\QuestionRepositoryInterface;

class QuestionService
{
    private $questionRepo;

	public function __construct(QuestionRepositoryInterface $questionRepo)
    {
        $this->questionRepo = $questionRepo;
    }

    /**
     * 指定された質問を検索し、返します。
     *
     * @param string $id
     * @return Illuminate\Database\Eloquent\Model
     */
    public function findQuestion($id)
    {
        return $this->questionRepo->findQuestion($id);   
    }


    public function store($request)
    {
        return $this->questionRepo->storeQuestion($request);
    }
}    

