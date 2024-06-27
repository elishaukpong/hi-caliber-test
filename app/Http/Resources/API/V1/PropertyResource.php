<?php

namespace App\Http\Resources\API\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'property',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'price' => $this->price,
                'bedrooms' => $this->bedroom_count,
                'bathrooms' => $this->bathroom_count,
                'storeys' => $this->storey_count,
                'garages' => $this->garage_count,
                'createdAt' => $this->created_at->format('d-m-Y h:i:s'),
                'updatedAt' => $this->updated_at->format('d-m-Y h:i:s')
            ]
        ];
    }
}
