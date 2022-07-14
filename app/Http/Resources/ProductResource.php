<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'explanation' => $this->explanation,
            'price' => $this->price,
            'images' => $this->images,
            'categories' => $this->categories->pluck('id'),
            'tax_class' => $this->tax_class,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}