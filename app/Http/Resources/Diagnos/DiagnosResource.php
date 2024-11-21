<?php

namespace App\Http\Resources\Diagnos;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiagnosResource extends JsonResource
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
            'ds' => $this->ds,
            'name' => "{$this->mkb->ds} {$this->mkb->name}",
            'type' => $this->diagnos_type->name
        ];
    }
}
