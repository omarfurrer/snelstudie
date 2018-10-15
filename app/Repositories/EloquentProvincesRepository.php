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

}
