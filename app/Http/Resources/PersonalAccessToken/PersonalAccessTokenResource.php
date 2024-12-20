<?php

namespace App\Http\Resources\PersonalAccessToken;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonalAccessTokenResource extends JsonResource
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
            'name' => $this->name,
            'abilities' => $this->abilities,
            "last_used_at" => $this->last_used_at,
            "expires_at" => $this->expires_at,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
