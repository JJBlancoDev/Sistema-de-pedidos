<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductOrderResource extends JsonResource
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
            'idProduct' => $this->id, 
            'stock' => $this->whenPivotLoaded('order_product', fn() => $this->pivot->stockRequired),
            'pryce'=> $this->whenPivotLoaded('order_product', fn() => $this->pivot->pryce),
        ];
    }
}
