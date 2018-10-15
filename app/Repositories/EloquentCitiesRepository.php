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

}
