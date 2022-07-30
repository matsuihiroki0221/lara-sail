<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\SalesDetail;
use Carbon\Carbon;

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
            'table_no' => SalesDetail::find($this->sales_detail_id)->table_no,
            'finished_at'=> (new Carbon($this->finished_at))->toDateTimeString(),
            'created_at' => (new Carbon($this->created_at))->toDateTimeString()
        ];
    }
}
