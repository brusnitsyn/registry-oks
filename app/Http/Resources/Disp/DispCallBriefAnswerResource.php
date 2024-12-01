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
            'has_need_consult_doctor' => $this->has_need_consult_doctor,
            'has_disable_other_answer' => $this->has_disable_other_answer,
            'has_disable_answers' => $this->has_disable_answers,
            'disable_answer_ids' => $this->disable_answer_ids,
            'enable_answer_ids' => $this->enable_answer_ids,
            'disp_call_brief_question_id' => $this->disp_call_brief_question_id,
            'disp_call_brief_question_chapter_id' => $this->dispCallBriefQuestion->dispCallBriefQuestionChapter->id
        ];
    }
}
