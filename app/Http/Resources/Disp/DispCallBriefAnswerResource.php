<?php

namespace App\Http\Resources\Disp;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DispCallBriefAnswerResource extends JsonResource
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
            'answer' => $this->answer,
            'has_send_smp' => $this->has_send_smp,
            'has_send_doctor' => $this->has_send_doctor,
            'has_attention' => $this->has_attention,
            'has_need_consult_doctor' => $this->has_need_consult_doctor
        ];
    }
}
