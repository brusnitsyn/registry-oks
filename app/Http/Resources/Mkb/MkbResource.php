<?php

namespace App\Http\Resources\Mkb;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MkbResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => "$this->ds $this->name",
        ];
    }
}
