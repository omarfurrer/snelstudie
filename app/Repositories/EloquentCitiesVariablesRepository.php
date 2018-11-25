<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CitiesVariablesRepositoryInterface;
use App\Models\CitiesVariable;
use App\Enums\CitiesVariableDefaultValues;

class EloquentCitiesVariablesRepository extends EloquentAbstractRepository implements CitiesVariablesRepositoryInterface {

    /**
     * Provinces Repository constructor.
     */
    public function __construct()
    {
        $this->modelClass = CitiesVariable::class;
    }

    /**
     * Create Cities Variable.
     * 
     * @param array $fields
     * @return CitiesVariable
     */
    public function create(array $fields = null)
    {
        $fields['code'] = str_replace('-', '_', $fields['code']);

        return parent::create($fields);
    }

    /**
     * Update Cities Variable.
     * 
     * @param Integer $id
     * @param array $fields
     * @return CitiesVariable
     */
    public function update($id, array $fields = null)
    {
        $fields['code'] = str_replace('-', '_', $fields['code']);

        // Reset any old default values just in case
        switch ($fields['default_value']) {
            case CitiesVariableDefaultValues::FIXED:
                $fields['default_field_name'] = NULL;
                break;
            case CitiesVariableDefaultValues::FIELD:
                $fields['default_fixed_value'] = NULL;
                break;
            default:
                $fields['default_field_name'] = NULL;
                $fields['default_fixed_value'] = NULL;
                break;
        }

        return parent::update($id, $fields);
    }

}
