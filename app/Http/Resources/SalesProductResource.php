<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class SalesProductResource extends JsonResource
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
            'number_purchases'=> $this->number_purchases,
            'product'=> new ProductResource(Product::find($this->product_id)),
            'sales_detail_id' => $this->sales_detail_id,
            'status'=> $this->status,
            'finished_at'=> $this->finished_at,
        ];
    }
}
