<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductForOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'change'=> $this->change,
            'deposit_amount'=> $this->change,
            'sales_products'=> SalesProductResource::collection($this->sales_products),
            'status'=> 1,
            'store_id'=> 3,
            'table_no'=> 1,
            'paid_at'=> "2022-07-24 07:59:35",
        ];
    }
}
