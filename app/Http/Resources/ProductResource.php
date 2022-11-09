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
            'slug' => $this->slug,
            'thumbnail_url' => $this->thumbnail_url,
            'description' => $this->description,
            'active' => (bool)$this->active,
            'price' => $this->moneyFormat($this->price),
            'category' => CategoryResource::make($this->Category),
            'created_at' => $this->created_at,
        ];
    }

    public function moneyFormat($price) {
       return  'R$ '.number_format($price, 2);
    }
}
