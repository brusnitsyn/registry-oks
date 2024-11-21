<?php

namespace App\Http\Resources\Pacient;

use App\Http\Resources\Certification\ShortCertificationResource;
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
            'birth_at' => $this->birth_at,
            'receipt_at' => $this->receipt_at,
            'discharge_at' => $this->discharge_at,
            'ds' => $this->last_disp->main_diag->mkb->ds
        ];
    }
}
