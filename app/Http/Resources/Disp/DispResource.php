<?php

namespace App\Http\Resources\Disp;

use App\Http\Resources\Diagnos\ComplicationResource;
use App\Http\Resources\Diagnos\ConcoDiagnosResource;
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
            'disp_status' => $this->disp_status->name ?? null,
            'main_diagnos' => DiagnosResource::make($this->main_diag),
            'conco_diagnos' => ConcoDiagnosResource::make($this->conco_diag->conco_diag),
            'complications' => ComplicationResource::make($this->complications->complication) ?? null,
            'lek_pr_state' => $this->lek_pr_state->name ?? null,
            'disp_dop_health' => $this->disp_dop_health->name ?? null,
            'control_points' => DispControlPointResource::collection($this->control_points),
        ];
    }
}
