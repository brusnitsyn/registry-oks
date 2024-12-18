<?php

namespace App\Http\Resources\Disp;

use App\Http\Resources\Diagnos\ComplicationResource;
use App\Http\Resources\Diagnos\ConcoDiagnosResource;
use App\Http\Resources\Diagnos\DiagnosResource;
use App\Http\Resources\Diagnos\DispConcoDiagnosResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

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
            'begin_at' => $this->begin_at ? Carbon::parse($this->begin_at)->valueOf() : null,
            'end_at' => $this->end_at ? Carbon::parse($this->end_at)->valueOf() : null,
            'disp_status' => $this->disp_status->name ?? null,
            'disp_reason_close' => DispReasonCloseResource::make($this->disp_reason_close),
            'main_diagnos' => DiagnosResource::make($this->main_diag),
            'conco_diagnos' => DispConcoDiagnosResource::collection($this->conco_diag),
            'complications' => DispComplicationResource::collection($this->complications) ?? null,
            'lek_pr_state' => $this->lek_pr_state->name ?? null,
            'lek_period' => $this->lek_period->name ?? null,
            'disp_dop_health' => $this->disp_dop_health->name ?? null,
            'control_points' => DispControlPointResource::collection($this->control_points),
        ];
    }
}
