<?php

namespace App\Http\Resources\Disp;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CallDispControlPointResource extends JsonResource
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
            'result_call_id' => $this->result_call_id,
            'result_call' => $this->result_call->name,
            'info' => $this->info
        ];
    }
}
