<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CandyResource extends JsonResource
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
        return [
            'id' => $this->uuid,
            'name' => $this->name,
            'sku' => $this->sku,
            'price' => $this->price,
            'details' => $this->details,
            'in_cart' => $this->inCart($this->id)
        ];
    }
}
