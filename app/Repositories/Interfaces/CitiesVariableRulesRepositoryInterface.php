<?php

namespace App\Repositories\Interfaces;

interface CitiesVariableRulesRepositoryInterface {

    /**
     * Get rule by cities variable and city.
     * 
     * @param Integer $citiesVariableID
     * @param Integer $cityID
     * @return CitiesVariableRule
     */
    public function getByVariableAndCity($citiesVariableID, $cityID);
}
