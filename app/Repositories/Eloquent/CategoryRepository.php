<?php

namespace App\Repositories\Eloquent;

use App\Repositories\CategoryRepositoryInterface;
use App\Category;
use App\Entities\Category as CategoryEntity;

class CategoryRepository implements CategoryRepositoryInterface
{

    /**
     * @param array $requestOption
     * @return CategoryEntity[]
     */
    public function findAll(array $requestOption): array
    {
        $categoryEntities = array();
        if ( array_key_exists( 'column',$requestOption ) ){
            $categories = Category::orderBy($requestOption['column'], $requestOption['sort_order'])->get();
        } else {
            $categories = Category::all();
        }
        foreach ($categories as $category) {
            $categoryEntities[] = new CategoryEntity($category->id, $category->category_name, $category->updated_at);
        }
        return $categoryEntities;
    }

    /**
     * @param int $id
     * @return CategoryEntity
     */
    public function find(int $id): CategoryEntity
    {
        $category = Category::findOrFail($id);
        return new CategoryEntity($category->id, $category->category_name);
    }

    /**
     * @param CategoryEntity $categoryEntity
     */
    public function update(CategoryEntity $categoryEntity): void
    {
        $category = Category::findOrFail($categoryEntity->getId());
        $category->categoryName = $categoryEntity->getCategoryName();
        $category->save();
    }

    /**
     * @param CategoryEntity $categoryEntity
     */
    public function store(CategoryEntity $categoryEntity): void
    {
        $category = new Category();
        $category->category_name = $categoryEntity->getCategoryName();
        $category->save();
    }

    /**
     * @param int[] $ids
     */
    public function delete(array $ids): void
    {
        foreach ($ids as $id) {
            $category = Category::findOrFail($id);
            $category->delete();
        }
    }

    /**
     * @return int
     */
    public function nextIdentity(): int
    {
        return 1 + Category::max('id');
    }
}
