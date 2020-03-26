<?php

namespace App\Repositories;

use App\Entities\Category as CategoryEntity;

interface CategoryRepositoryInterface
{
    /**
     * @param array $requestOption
     * @return CategoryEntity[]
     */
    public function findAll(array $requestOption): array;

    /**
     * @param int $id
     * @return CategoryEntity
     */
    public function find(int $id): CategoryEntity;

    /**
     * @param CategoryEntity $categoryEntity
     */
    public function update(CategoryEntity $categoryEntity):void;

    /**
     * @param CategoryEntity $categoryEntity
     */
    public function store(CategoryEntity $categoryEntity): void;

    /**
     * @param int[] $ids
     */
    public function delete(array $ids): void;

    /**
     * @return int
     */
    public function nextIdentity(): int;
}
