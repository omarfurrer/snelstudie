<?php

namespace App\Http\Requests\CitiesVariables;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Enums\CitiesVariableDefaultValues;
use App\Enums\CitiesVariableDefaultFieldNames;

class StoreCitiesVariableRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
            'code' => 'required|unique:cities_variables,code|alpha_dash',
            'default_value' => ['required', Rule::in(CitiesVariableDefaultValues::values())],
            'default_fixed_value' => 'required_if:default_value,' . CitiesVariableDefaultValues::FIXED . '|nullable|string',
            'default_field_name' => ['required_if:default_value,' . CitiesVariableDefaultValues::FIELD, 'nullable', Rule::in(CitiesVariableDefaultFieldNames::values())]
        ];
    }

}
