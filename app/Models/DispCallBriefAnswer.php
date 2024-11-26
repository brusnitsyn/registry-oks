<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DispCallBriefAnswer extends Model
{
    protected $fillable = [
        'disp_call_brief_question_id',
        'answer',
        'has_send_smp',
        'has_send_doctor',
        'has_attention',
        'has_need_consult_doctor'
    ];

    public function dispCallBriefQuestion()
    {
        return $this->hasOne(DispCallBriefQuestion::class);
    }
}
