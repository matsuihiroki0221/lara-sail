<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
    
    public function validationData()
    {
        $newProdcut = json_decode($this->input('product'), true);
        return $this->all() + ['saveData' => $newProdcut];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'newProduct' => 'json',
            'saveData.name' => 'required|max:100',
            'saveData.price' => 'required',
        ];
    }
}
