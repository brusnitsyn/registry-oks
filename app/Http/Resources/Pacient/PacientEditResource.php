<?php

namespace App\Http\Resources\Pacient;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PacientEditResource extends JsonResource
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
            'num' => $this->num,
            'fio' => $this->fio,
            'snils' => $this->snils,
            'tel' => $this->tel,
            'birth_at' => $this->birth_at,
            'lpu_id' => $this->lpu_id,
            'receipt_at' => $this->receipt_at,
            'discharge_at' => $this->discharge_at,
            'disp' => [
                'id' => $this->active_disp->id,
                'begin_at' => $this->active_disp->begin_at,
                'end_at' => $this->active_disp->end_at,
                'disp_state_id' => $this->active_disp->disp_state_id,
                'main_diagnos_id' => $this->active_disp->main_diag->mkb_id,
                'conco_diagnos_id' => $this->active_disp->conco_diag->conco_diag->id ?? null,
                'complications_id' => $this->active_disp->complications->complication->id ?? null,
                'lek_pr_state_id' => $this->active_disp->lek_pr_state_id,
                'disp_dop_health_id' => $this->active_disp->disp_dop_health_id,
                'control_points' => $this->active_disp->control_points
            ],
        ];
    }
}
