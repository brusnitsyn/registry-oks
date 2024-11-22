<?php

namespace App\Http\Resources\Diagnos;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DispConcoDiagnosResource extends JsonResource
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
            'name' => $this->conco_diag->name
        ];
    }
}
