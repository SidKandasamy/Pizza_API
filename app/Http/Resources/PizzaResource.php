<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PizzaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->resource->load("toppings");
        return [
            "id" => $this->id,
            "name" => $this->name,
            "diet requirements" => $this->diet["Name"],
            "toppings" =>$this->toppings->pluck("Name")
        ];
    }
}
