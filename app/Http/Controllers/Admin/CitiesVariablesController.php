<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enums\CitiesVariableDefaultValues;
use App\Enums\CitiesVariableDefaultFieldNames;
use App\Http\Requests\CitiesVariables\StoreCitiesVariableRequest;
use App\Http\Requests\CitiesVariables\UpdateCitiesVariableRequest;
use App\Repositories\Interfaces\CitiesVariablesRepositoryInterface;
use App\Models\CitiesVariable;

class CitiesVariablesController extends Controller {

    /**
     * @var CitiesVariablesRepositoryInterface 
     */
    protected $citiesVariablesRepository;

    /**
     * CitiesVariablesController Constructor.
     * 
     * @param CitiesVariablesRepositoryInterface $citiesVariablesRepository
     */
    public function __construct(CitiesVariablesRepositoryInterface $citiesVariablesRepository)
    {
        $this->citiesVariablesRepository = $citiesVariablesRepository;
    }

    /**
     * List all cities variables. 
     * 
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $citiesVariables = $this->citiesVariablesRepository->all();
        $defaultValuesList = CitiesVariableDefaultValues::lists();
        $defaultFieldNamesList = CitiesVariableDefaultFieldNames::lists();
        return view('admin.cities_variables.index', compact('citiesVariables', 'defaultValuesList', 'defaultFieldNamesList'));
    }

    /**
     * Load create new Cities Variable page.
     * 
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        $defaultValuesList = CitiesVariableDefaultValues::lists();
        $defaultFieldNamesList = CitiesVariableDefaultFieldNames::lists();
        return view('admin.cities_variables.create', compact('defaultValuesList', 'defaultFieldNamesList'));
    }

    /**
     * Store cities variable.
     * 
     * @param StoreCitiesVariableRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCitiesVariableRequest $request)
    {
        $citiesVariable = $this->citiesVariablesRepository->create($request->all());
        return redirect()->to("/admin/cities_variables/{$citiesVariable->id}/edit");
    }

    /**
     * Load edit cities variable page.
     * 
     * @param CitiesVariable $citiesVariable
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function edit(CitiesVariable $citiesVariable)
    {
        $defaultValuesList = CitiesVariableDefaultValues::lists();
        $defaultFieldNamesList = CitiesVariableDefaultFieldNames::lists();
        return view('admin.cities_variables.edit', compact('citiesVariable', 'defaultValuesList', 'defaultFieldNamesList'));
    }

    /**
     * Update Cities variable.
     * 
     * @param UpdateCitiesVariableRequest $request
     * @param CitiesVariable $citiesVariable
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCitiesVariableRequest $request, CitiesVariable $citiesVariable)
    {
        $this->citiesVariablesRepository->update($citiesVariable->id, $request->all());
        return redirect()->to('/admin/cities_variables');
    }

    /**
     * Delete a cities variable.
     * 
     * @param CitiesVariable $citiesVariable
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CitiesVariable $citiesVariable)
    {
        $this->citiesVariablesRepository->delete($citiesVariable);
        return redirect()->to('/admin/cities_variables');
    }

}
