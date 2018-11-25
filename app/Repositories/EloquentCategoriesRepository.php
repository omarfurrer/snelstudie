<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Models\Category;

class EloquentCategoriesRepository extends EloquentAbstractRepository implements CategoriesRepositoryInterface {

    /**
     * Provinces Repository constructor.
     */
    public function __construct()
    {
        $this->modelClass = Category::class;
    }

    /**
     * Create Category.
     * 
     * @param array $fields
     * @return Category
     */
    public function create(array $fields = null)
    {
        $fields['slug'] = str_slug($fields['name']);

        return parent::create($fields);
    }

    /**
     * Update Category.
     * 
     * @param Integer $id
     * @param array $fields
     * @return Category
     */
    public function update($id, array $fields = null)
    {
        $fields['slug'] = str_slug($fields['name']);

        return parent::update($id, $fields);
    }

}
