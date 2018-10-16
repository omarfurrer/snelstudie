<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProvincesRepositoryInterface;
use App\Models\Province;

class EloquentProvincesRepository extends EloquentAbstractRepository implements ProvincesRepositoryInterface {

    /**
     * Provinces Repository constructor.
     */
    public function __construct()
    {
        $this->modelClass = Province::class;
    }

    /**
     * Create Province.
     * 
     * @param array $fields
     * @return Province
     */
    public function create(array $fields = null)
    {
        $fields['slug'] = str_slug($fields['name']);

        return parent::create($fields);
    }

}
