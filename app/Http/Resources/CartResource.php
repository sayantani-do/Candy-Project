<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        // dd("ge");
        return [
            'id' => $this->id,
            'quantity' => $this->quantity,
            'candy_id' => $this->getCandy->uuid,
            'name' => $this->getCandy->name,
            'sku' => $this->getCandy->sku,
            'price' => $this->getCandy->price,
            'details' => $this->getCandy->details
        ];
    }
}
