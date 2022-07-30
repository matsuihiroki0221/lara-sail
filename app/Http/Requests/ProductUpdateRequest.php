<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class ProductUpdateRequest extends FormRequest
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

    // public function validationData()
    // {
    //     $product = json_decode($this->input('product'), true);
    //     return $this->all() + ['product' => $product];
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product' => 'json',
            'product.name' => 'required|max:100',
            'product.price' => 'required',
        ];
    }
}
