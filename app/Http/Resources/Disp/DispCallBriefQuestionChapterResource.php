<?php

namespace App\Http\Resources\Disp;

use App\Models\DispCallBriefQuestion;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DispCallBriefQuestionChapterResource extends JsonResource
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
            'name' => $this->name,
            'questions' => DispCallBriefQuestionResource::collection($this->dispCallBriefQuestions)
        ];
    }
}
