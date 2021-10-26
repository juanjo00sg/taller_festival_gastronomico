<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return ['name'=>$this->name,
        'description'=>$this->description,
        'city'=>$this->city,
        'phone'=>$this->phone,
        'category'=>$this->category->name,
        'owner'=>$this->owner->name

    ];
    }
}
