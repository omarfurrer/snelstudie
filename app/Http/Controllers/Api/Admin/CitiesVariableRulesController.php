<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CitiesVariable;
use App\Models\CitiesVariableRule;
use App\Http\Requests\CitiesVariableRules\StoreCitiesVariableRuleRequest;
use App\Http\Requests\CitiesVariableRules\UpdateCitiesVariableRuleRequest;
use App\Repositories\Interfaces\CitiesVariableRulesRepositoryInterface;

class CitiesVariableRulesController extends Controller {

    /**
     * @var CitiesVariableRulesRepositoryInterface 
     */
    protected $citiesVariableRulesRepository;

    /**
     * CitiesVariableRulesController Constructor.
     * 
     * @param CitiesVariableRulesRepositoryInterface $citiesVariableRulesRepository
     */
    public function __construct(CitiesVariableRulesRepositoryInterface $citiesVariableRulesRepository)
    {
        $this->citiesVariableRulesRepository = $citiesVariableRulesRepository;
    }

    /**
     * Get all rules for a cities variable.
     * 
     * @param CitiesVariable $citiesVariable
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(CitiesVariable $citiesVariable)
    {
        $rules = $this->citiesVariableRulesRepository->findAllBy($citiesVariable->id, 'cities_variable_id');
        $rules->load('city');
        return response()->json(compact('rules'));
    }

    /**
     * Create new cities variable rule.
     * 
     * @param StoreCitiesVariableRuleRequest $request
     * @param CitiesVariable $citiesVariable
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCitiesVariableRuleRequest $request, CitiesVariable $citiesVariable)
    {
        $citiesVariableRule = $this->citiesVariableRulesRepository->create(array_merge($request->all(), ['cities_variable_id' => $citiesVariable->id]));
        $citiesVariableRule->load('city');
        return response()->json(compact('citiesVariableRule'));
    }

    /**
     * Update existing rule for cities variable.
     * 
     * @param UpdateCitiesVariableRuleRequest $request
     * @param CitiesVariable $citiesVariable
     * @param CitiesVariableRule $citiesVariableRule
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCitiesVariableRuleRequest $request, CitiesVariable $citiesVariable, CitiesVariableRule $citiesVariableRule)
    {
        $citiesVariableRule = $this->citiesVariableRulesRepository->update($citiesVariableRule->id, $request->only('rule'));
        $citiesVariableRule->load('city');
        return response()->json(compact('citiesVariableRule'));
    }

    /**
     * Delete cities variable rule.
     * 
     * @param CitiesVariable $citiesVariable
     * @param CitiesVariableRule $citiesVariableRule
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(CitiesVariable $citiesVariable, CitiesVariableRule $citiesVariableRule)
    {
        $this->citiesVariableRulesRepository->delete($citiesVariableRule);
        return response()->json();
    }

}
