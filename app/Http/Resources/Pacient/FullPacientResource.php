<?php

namespace App\Http\Resources\Pacient;

use App\Http\Resources\Certification\ShortCertificationResource;
use App\Http\Resources\Diagnos\DiagnosResource;
use App\Http\Resources\Disp\DispResource;
use App\Http\Resources\StaffIntegrate\StaffIntegrateResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FullPacientResource extends JsonResource
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
            'dop_tel' => $this->dop_tel,
            'birth_at' => $this->birth_at,
            'receipt_at' => $this->receipt_at,
            'discharge_at' => $this->discharge_at,

            'disp' => DispResource::make($this->active_disp),
            'disps' => DispResource::collection($this->not_active_disps)
        ];
    }
}
