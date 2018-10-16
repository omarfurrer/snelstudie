<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CitiesRepositoryInterface;
use App\Models\City;

class EloquentCitiesRepository extends EloquentAbstractRepository implements CitiesRepositoryInterface {

    /**
     * Provinces Repository constructor.
     */
    public function __construct()
    {
        $this->modelClass = City::class;
    }

    /**
     * Create City.
     * 
     * @param array $fields
     * @return City
     */
    public function create(array $fields = null)
    {
        $fields['slug'] = str_slug($fields['name']);

        return parent::create($fields);
    }

}
