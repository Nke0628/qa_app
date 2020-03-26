<?php


namespace App\Services;

use App\Repositories\CategoryRepositoryInterface;
use App\Entities\Category as CategoryEntity;

class CategoryService extends CommonService
{
    /**
     * @var CategoryRepositoryInterface;
     */
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * カテゴリー一覧を取得する
     *
     * @param array $requestOption
     * @return array
     */
    public function showAllCategory($requestOption): array
    {
        return $this->categoryRepository->findAll($requestOption);
    }

    /**
     * カテゴリーを登録する
     *
     * @param array $request
     */
    public function registerCategory(array $request): void
    {
        $id = $this->categoryRepository->nextIdentity();
        $category = new CategoryEntity($id, $request['category-name']);
        $this->categoryRepository->store($category);
    }

    /**
     * カテゴリーを削除する
     *
     * @param int[] $ids
     */
    public function deleteCategory(array $ids): void
    {
        $this->categoryRepository->delete($ids);
    }

    /**
     * カテゴリーを更新する
     *
     * @param array $request
     */
    public function updateCategory(array $request): void
    {
        $category = new CategoryEntity($request['id'], $request['category-name']);
        $this->categoryRepository->update($category);
    }
}
