<?php

namespace App\Http\Resources\Disp;

use App\Http\Resources\Diagnos\DiagnosResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DispResource extends JsonResource
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
            'begin_at' => $this->begin_at,
            'end_at' => $this->end_at,
            'complications' => $this->complications,
            'disp_status' => $this->disp_status->name ?? null,
            'control_points' => DispControlPointResource::collection($this->control_points),
            'diagnoses' => DiagnosResource::collection($this->diagnoses),
            'lek_pr_state' => $this->lek_pr_state->name ?? null,
            'disp_dop_health' => $this->disp_dop_health->name ?? null
        ];
    }
}
