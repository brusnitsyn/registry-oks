<?php

namespace App\Http\Resources\Disp;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DispControlPointResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'control_point' => [
                'id' => $this->id,
                'point' => $this->controlPoint->name,
                'control_at' => $this->control_at,
                'controled_at' => $this->controled_at,
                'control_point_option_id' => $this->control_point_option_id
            ],
            'call' => $this->calls
        ];
    }
}
