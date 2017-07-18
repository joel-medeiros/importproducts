<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
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
            'name' => 'required|max:50',
            'category_id' => 'required',
            'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'description' => 'required|max:255',
            'active'    => 'sometimes|boolean'
        ];
    }
}
