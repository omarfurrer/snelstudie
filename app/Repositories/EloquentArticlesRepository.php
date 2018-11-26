<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ArticlesRepositoryInterface;
use App\Models\Article;

class EloquentArticlesRepository extends EloquentAbstractRepository implements ArticlesRepositoryInterface {

    /**
     * Provinces Repository constructor.
     */
    public function __construct()
    {
        $this->modelClass = Article::class;
    }

    /**
     * Create Article.
     * 
     * @param array $fields
     * @return Article
     */
    public function create(array $fields = null)
    {
        $fields['slug'] = str_slug($fields['title']);

        return parent::create($fields);
    }

    /**
     * Update Article.
     * 
     * @param Integer $id
     * @param array $fields
     * @return Article
     */
    public function update($id, array $fields = null)
    {
        $fields['slug'] = str_slug($fields['title']);

        return parent::update($id, $fields);
    }

}
