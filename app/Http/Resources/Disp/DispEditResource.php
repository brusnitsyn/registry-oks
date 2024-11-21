<?php

namespace App\Http\Resources\Disp;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DispEditResource extends JsonResource
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
            'disp_state_id' => $this->disp_state_id,
            'main_diagnos_id' => $this->main_diag->mkb_id,
            'conco_diagnos_id' => $this->conco_diag->conco_diag->id ?? null,
            'complications_id' => $this->complications->complication->id ?? null,
            'lek_pr_state_id' => $this->lek_pr_state_id,
            'disp_dop_health_id' => $this->disp_dop_health_id,
            'control_points' => $this->control_points
        ];
    }
}
