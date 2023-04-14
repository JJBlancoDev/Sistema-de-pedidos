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
            'idProduct' => $this->id, 
            'code' => $this->code,
            'nameProduct' => $this->name_product,
            'stock' => $this->whenPivotLoaded('order_product', fn() => $this->pivot->stockRequired),
            'pryceDollars'=> $this->whenPivotLoaded('order_product', fn() => $this->pivot->pryce),
            'pryce' => $this->pryce
        ];
    }
    public function with($request)
    {
        return [
            'response' => true
        ];
    }
}
