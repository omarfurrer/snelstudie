<?php

namespace App\Http\Requests\ContentBlocks;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContentBlockRequest extends FormRequest {

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
            'code' => ['required', Rule::unique('content_blocks')->ignore($this->route('content_block')->id), 'alpha_dash'],
            'content' => 'required'
        ];
    }

}
