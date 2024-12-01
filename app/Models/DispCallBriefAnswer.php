<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class DispCallBriefAnswer extends Model
{
    protected $fillable = [
        'disp_call_brief_question_id',
        'answer',
        'has_send_smp',
        'has_send_doctor',
        'has_attention',
        'has_need_consult_doctor',
        'has_disable_other_answer',
        'has_disable_answers',
        'disable_answer_ids',
        'enable_answer_ids',
    ];

    protected function disableAnswerIds(): Attribute
    {
        return Attribute::make(
            get: fn (string|null $value) => !is_null($value) ? unserialize($value) : null,
        );
    }

    protected function enableAnswerIds(): Attribute
    {
        return Attribute::make(
            get: fn (string|null $value) => !is_null($value) ? unserialize($value) : null,
        );
    }

    public function dispCallBriefQuestion()
    {
        return $this->belongsTo(DispCallBriefQuestion::class);
    }
}
