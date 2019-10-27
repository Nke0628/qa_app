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


    public function store($request)
    {
        return $this->questionRepo->storeQuestion($request);
    }
}    

