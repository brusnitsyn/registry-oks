<?php

namespace App\Http\Resources\Pacient;

use App\Http\Resources\Certification\ShortCertificationResource;
use App\Http\Resources\Disp\DispControlPointResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class ShortPacientResource extends JsonResource
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
            'receipt_at' => $this->receipt_at,
            'discharge_at' => $this->discharge_at,
            'ds' => $this->last_disp->main_diag->mkb->ds,
            'disp_status' => $this->last_disp->disp_state_id == 1 ? 'Взят' : 'Снят',
            'lek_pr_status' => $this->last_disp->lek_pr_state->name,
            'dop_heal' => $this->last_disp->disp_dop_health->name,
            'control_points' => [
                'day3' => [
                    'control_point_option_id' => $this->last_disp->day3->control_point_option_id,
                    'result_call_id' => $this->last_disp->day3->calls->result_call_id ?? null,
                ],
                'mes1' => [
                    'control_point_option_id' => $this->last_disp->mes1->control_point_option_id,
                    'result_call_id' => $this->last_disp->mes1->calls->result_call_id ?? null,
                ],
                'mes3' => [
                    'control_point_option_id' => $this->last_disp->mes3->control_point_option_id,
                    'result_call_id' => $this->last_disp->mes3->calls->result_call_id ?? null,
                ],
                'mes6' => [
                    'control_point_option_id' => $this->last_disp->mes6->control_point_option_id,
                    'result_call_id' => $this->last_disp->mes6->calls->result_call_id ?? null,
                ],
                'mes12' => [
                    'control_point_option_id' => $this->last_disp->mes12->control_point_option_id,
                    'result_call_id' => $this->last_disp->mes12->calls->result_call_id ?? null,
                ],
            ]
        ];
    }
}
