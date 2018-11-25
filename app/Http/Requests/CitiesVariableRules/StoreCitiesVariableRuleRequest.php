<?php

namespace App\Http\Requests\CitiesVariableRules;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCitiesVariableRuleRequest extends FormRequest {

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
            'city_id' => [
                'required',
                'exists:cities,id',
                Rule::unique('cities_variables_rules')->where(function ($query) {
                            return $query->where('cities_variable_id', $this->route('cities_variable')->id);
                        })
            ],
            'rule' => 'required'
        ];
    }

}
