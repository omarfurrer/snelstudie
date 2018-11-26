<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ArticlesRepositoryInterface;
use App\Http\Requests\Articles\StoreArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use App\Models\Article;

class ArticlesController extends Controller {

    /**
     * @var ArticlesRepositoryInterface 
     */
    protected $articlesRepository;

    /**
     * ArticlesController Constructor.
     * 
     * @param ArticlesRepositoryInterface $articlesRepository
     */
    public function __construct(ArticlesRepositoryInterface $articlesRepository)
    {
        $this->articlesRepository = $articlesRepository;
    }

    /**
     * List all content blocks. 
     * 
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $articles = $this->articlesRepository->all();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Load create new content block page.
     * 
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store content block.
     * 
     * @param StoreArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreArticleRequest $request)
    {
        $this->articlesRepository->create($request->all());
        return redirect()->to('/admin/articles');
    }

    /**
     * Load view to edit a content block.
     * 
     * @param Article $article
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update content block.
     * 
     * @param UpdateArticleRequest $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $this->articlesRepository->update($article->id, $request->all());
        return redirect()->to('/admin/articles');
    }

    /**
     * Delete a content block.
     * 
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article)
    {
        $this->articlesRepository->delete($article);
        return redirect()->to('/admin/articles');
    }

}
