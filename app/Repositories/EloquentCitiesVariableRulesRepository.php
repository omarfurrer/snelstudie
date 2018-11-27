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

    /**
     * Get rule by cities variable and city.
     * 
     * @param Integer $citiesVariableID
     * @param Integer $cityID
     * @return CitiesVariableRule
     */
    public function getByVariableAndCity($citiesVariableID, $cityID)
    {
        return CitiesVariableRule::where('cities_variable_id', $citiesVariableID)->where('city_id', $cityID)->first();
    }

}
