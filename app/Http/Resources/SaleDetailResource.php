<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SaleDetailResource extends JsonResource
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
            'client' => $this->sale->client,
            'name' => $this->product->name,
            'price' => $this->price,
            'quantity' => $this->subtotal,
            'state' => $this->state,
        ];        
    }

    public function with($request)
    {
        return [
            'status' => 'success',
        ];
    }
}
