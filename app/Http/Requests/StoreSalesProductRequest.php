<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalesProductRequest extends FormRequest
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
            'order_content.product_id' => 'required|numeric',
            'order_content.number_purchases' => 'required|numeric',
            'other_info.branch_id' => 'required|numeric',
            'other_info.sales_detail_id' => 'nullable|numeric',
            'other_info.table_no' => 'required|numeric',
        ];
    }
}
