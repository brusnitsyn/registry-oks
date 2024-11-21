<?php

namespace App\Http\Resources\Pacient;

use App\Http\Resources\Disp\DispEditResource;
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
            'disp' => DispEditResource::make($this->active_disp)
        ];
    }
}
