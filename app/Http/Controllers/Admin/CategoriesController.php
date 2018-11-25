<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Http\Requests\Categories\StoreCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Models\Category;

class CategoriesController extends Controller {

    /**
     * @var CategoriesRepositoryInterface 
     */
    protected $categoriesRepository;

    /**
     * CategoriesController Constructor.
     * 
     * @param CategoriesRepositoryInterface $categoriesRepository
     */
    public function __construct(CategoriesRepositoryInterface $categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    /**
     * List all content blocks. 
     * 
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $categories = $this->categoriesRepository->all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Load create new content block page.
     * 
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store content block.
     * 
     * @param StoreCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        $this->categoriesRepository->create($request->all());
        return redirect()->to('/admin/categories');
    }

    /**
     * Load view to edit a content block.
     * 
     * @param Category $category
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update content block.
     * 
     * @param UpdateCategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->categoriesRepository->update($category->id, $request->all());
        return redirect()->to('/admin/categories');
    }

    /**
     * Delete a content block.
     * 
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category)
    {
        $this->categoriesRepository->delete($category);
        return redirect()->to('/admin/categories');
    }

}
