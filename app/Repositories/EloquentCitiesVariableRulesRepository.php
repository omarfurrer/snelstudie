<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CitiesVariableRulesRepositoryInterface;
use App\Models\CitiesVariableRule;

class EloquentCitiesVariableRulesRepository extends EloquentAbstractRepository implements CitiesVariableRulesRepositoryInterface {

    /**
     * CitiesVariableRule Repository constructor.
     */
    public function __construct()
    {
        $this->modelClass = CitiesVariableRule::class;
    }

}
