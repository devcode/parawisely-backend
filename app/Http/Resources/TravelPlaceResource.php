<?php

namespace App\Http\Resources;

use App\Models\TypePlace;
use Illuminate\Http\Resources\Json\JsonResource;

class TravelPlaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $icon = TypePlace::where('id', $this->type_id)->first();
        return [
            'id' => $this->id,
            'name_place' => $this->name_place,
            'slug' => $this->slug,
            'image' => $this->image,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'icon' => $icon->type_icon
        ];
    }
}
