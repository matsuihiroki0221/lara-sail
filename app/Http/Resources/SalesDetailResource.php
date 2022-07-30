<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SalesProductResource;

class SalesDetailResource extends JsonResource
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
            'sales_products'=> SalesProductResource::collection($this->salesProducts),
            'status'=> $this->status,
            'store_id'=> $this->store_id,
            'table_no'=> $this->table_no,
            'paid_at'=> $this->paid_at,
            'created_at' => $this->created_at,
        ];
    }
}
