<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'addresses',
            'id' => $this->id,
            'attributes' => [
                'street' => $this->street,
                'city' => $this->city,
                'country' => $this->country,
                'postal_code' => (string) $this->postal_code,
            ],
            'relationships' => []
        ];
    }
}
