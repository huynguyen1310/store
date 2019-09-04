<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|min:2|max:255|unique:products,name',
            'description' => 'required|min:2',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'promo' => 'required|numeric',
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute can\'t be blank',
            'min' => ':attribute can\'t less than 2 character',
            'max' => ':attribute can\'t more than 255 character',
            'numeric' => ':attribute must be numeric',
            'image' => ':attribute must be image',
        ];
    }

    public function attributes() {
        return [
            'name' => 'Product name',
            'description' => 'description',
            'qty' => 'qty',
            'price' => 'price',
            'promo' => 'promo',
            'image' => 'image',
        ];
    }
}
