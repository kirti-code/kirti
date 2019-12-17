<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProduct extends FormRequest
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
        $id = $this->route('product');
        return [
            'name' => 'bail|required|max:111|min:2',
            'categories_id' => 'required',
            'desription' => 'bail|required|min:5',
            'sku' => 'bail|required|unique:products,sku,' . $id . ',product_id|min:4',
            'amount' => 'bail|required|numeric',
            'status' => 'bail|required',
            'image' => 'bail|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
}
