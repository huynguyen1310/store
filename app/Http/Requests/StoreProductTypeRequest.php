<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductTypeRequest extends FormRequest
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
            'name' => 'required|min:2|max:255|unique:product_types,name',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute can\'t be blank',
            'min' => 'Must be more than 2 character',
            'max' => 'Can\'t be more 255 character',
            'unique' => 'Product type already exists'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Product type name'
        ];
    }
}
