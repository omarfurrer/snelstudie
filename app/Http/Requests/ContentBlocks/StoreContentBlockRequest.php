<?php

namespace App\Http\Requests\ContentBlocks;

use Illuminate\Foundation\Http\FormRequest;

class StoreContentBlockRequest extends FormRequest {

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
            'code' => 'required|unique:content_blocks,code|alpha_dash',
            'content' => 'required'
        ];
    }

}
