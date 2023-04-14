<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'idOrder' => $this->id,
            'idClient' => $this->id_client,
            'nameClient' => $this->name_client,
            'addresClient' => $this->addres_client,
            'cellphoneClient' => $this->cellphone_client,
            'createOrder' => substr($this->created_at, 0, 10),
            'products' => ProductOrderResource::collection($this->whenLoaded('products'))
        ];
    }
    public function with($request)
    {
        return [
            'response' => true
        ];
    }
}
