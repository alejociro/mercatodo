<?php

namespace App\Http\Controllers\Admin\Product;

use App\Actions\Admin\DeleteModelAction;
use App\Actions\Admin\Product\CategoryInCacheAction;
use App\Actions\Admin\Product\DeleteCategoryCache;
use App\Actions\Admin\Product\StoreCategoryAction;
use App\Actions\Admin\Product\UpdateCategoryAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\StoreCategoryRequest;
use App\Http\Requests\Admin\Categories\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:see-category|create-category|edit-category|delete-category', ['only'=>['index']]);
        $this->middleware('permission:create-category', ['only'=>['create','store']]);
        $this->middleware('permission:edit-category', ['only'=>['edit','update']]);
        $this->middleware('permission:delete-category',['only'=>['destroy']]);
    }

    public function index(CategoryInCacheAction $action): View
    {
        $categories = $action->categoriesCache();
        return view('admin.category.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.category.create');
    }

    public function store(StoreCategoryRequest $request, StoreCategoryAction $storeCategoryAction, DeleteCategoryCache $deleteCategoryCache): RedirectResponse
    {
        $storeCategoryAction->execute($request->validated(), new Category());
        $deleteCategoryCache->execute();
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category): View
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request,UpdateCategoryAction $updateCategoryAction ,Category $category, DeleteCategoryCache $deleteCategoryCache): RedirectResponse
    {
        $updateCategoryAction->execute($request->validated(), $category);
        $deleteCategoryCache->execute();
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category, DeleteModelAction $deleteModelAction, DeleteCategoryCache $deleteCategoryCache): RedirectResponse
    {
        $deleteModelAction->execute($category);
        $deleteCategoryCache->execute();
        return redirect()->route('admin.categories.index' );
    }
}
