<?php

namespace App\Services;

use App\Repositories\Interfaces\CitiesVariablesRepositoryInterface;
use App\Repositories\Interfaces\CitiesRepositoryInterface;
use App\Repositories\Interfaces\CitiesVariableRulesRepositoryInterface;
use App\Models\CitiesVariableRule;
use App\Models\CitiesVariable;
use App\Models\City;
use App\Enums\CitiesVariableDefaultValues;
use App\Enums\CitiesVariableDefaultFieldNames;

class CitiesVariablesValueExtractorService {

    /**
     * @var CitiesVariablesRepositoryInterface 
     */
    protected $citiesVariablesRepository;

    /**
     * @var CitiesRepositoryInterface 
     */
    protected $citiesRepository;

    /**
     * @var CitiesVariableRulesRepositoryInterface 
     */
    protected $citiesVariableRulesRepository;

    /**
     * CitiesVariablesValueExtractorService Constructor.
     * 
     * @param CitiesVariablesRepositoryInterface $citiesVariablesRepository
     * @param CitiesRepositoryInterface $citiesRepository
     * @param CitiesVariableRulesRepositoryInterface $citiesVariableRulesRepository
     */
    public function __construct(CitiesVariablesRepositoryInterface $citiesVariablesRepository, CitiesRepositoryInterface $citiesRepository,
            CitiesVariableRulesRepositoryInterface $citiesVariableRulesRepository)
    {
        $this->citiesVariablesRepository = $citiesVariablesRepository;
        $this->citiesRepository = $citiesRepository;
        $this->citiesVariableRulesRepository = $citiesVariableRulesRepository;
    }

    public function extract($code, $citySlug)
    {
        if (empty($code) || empty($citySlug)) {
            return false;
        }

        if (!is_string($code) || !is_string($citySlug)) {
            return false;
        }

        // Make sure code starts with correct prefix.
        if (explode('_', $code)[0] . '_' != CitiesVariable::$codePrefix) {
            return false;
        }

        // Remove prefix to search for code in table.
        $codeWithoutPrefix = str_replace(CitiesVariable::$codePrefix, '', $code);

        // Make sure variable exists.
        $citiesVariable = $this->citiesVariablesRepository->findBy($codeWithoutPrefix, 'code');
        if (!$citiesVariable instanceof CitiesVariable) {
            return false;
        }

        // Make sure city exists.
        $city = $this->citiesRepository->findBy($citySlug, 'slug');
        if (!$city instanceof City) {
            return false;
        }

        // If rule is defined for variable and city then return.
        $rule = $this->citiesVariableRulesRepository->getByVariableAndCity($citiesVariable->id, $city->id);
        if ($rule instanceof CitiesVariableRule) {
            return $rule->rule;
        }

        switch ($citiesVariable->default_value) {
            case CitiesVariableDefaultValues::EMPTY_VALUE :
                return '';
            case CitiesVariableDefaultValues::FIXED :
                return $citiesVariable->default_fixed_value;
            case CitiesVariableDefaultValues::FIELD :
                return $city[$citiesVariable->default_field_name];
            default:
                return false;
        }
    }

}
