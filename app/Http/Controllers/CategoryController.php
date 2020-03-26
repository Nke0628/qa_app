<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends CommonController
{
    /**
     * @var CategoryService
     */
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * 一覧表示
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $categories = $this->categoryService->showAllCategory($request->all());
        return view('categories.index',compact('categories'));
    }

    /**
     * 新規作成画面
     *
     * @return View
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * 登録
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $this->categoryService->registerCategory($request->all());
        return redirect('/master/category')->with('flash_message', 'カテゴリ作成しました。');
    }

    /**
     * 削除
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        $deleteChecks = $request->get('delete-chk');
        if ( !$deleteChecks ){
            abort(419);
        }

        $ids = array();
        foreach ( $deleteChecks as $id => $val ){
            $ids[] = $id;
        }
        $this->categoryService->deleteCategory($ids);
        return redirect('/master/category')->with('flash_message', 'カテゴリ削除しました。');
    }

    /**
     * 更新画面
     *
     * @return View
     */
    public function edit(): View
    {
        return view('categories.edit');
    }

    /**
     * 更新
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request): RedirectResponse
    {
        $this->categoryService->updateCategory($request->all());
        return redirect('/master/category')->with('flash_message', 'カテゴリ更新しました。');
    }

    /**
     * PDF表示 //FIXME 現在使用していないサンプル
     *
     * @param Request $request
     */
    public function show(Request $request)
    {
        $routePath = storage_path('app/public/download/');
        $filePath = $routePath . 'kara.txt';
        $this->categoryService->Open($filePath,'営業部.zip');
    }

    public function excel()
    {
        $this->categoryService->downloaedExcel();
    }

}
