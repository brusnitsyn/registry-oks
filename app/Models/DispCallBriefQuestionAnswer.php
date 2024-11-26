<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DispCallBriefQuestionAnswer extends Model
{
    protected $fillable = [
        'disp_id',
        'call_disp_control_point_id',
        'disp_call_brief_id',
        'disp_call_brief_question_id',
        'disp_call_brief_answer_id',
    ];

    public function disp()
    {
        return $this->belongsTo(Disp::class);
    }

    public function dispCallBrief()
    {
        return $this->belongsTo(DispCallBrief::class);
    }

    public function dispCallBriefQuestion()
    {
        return $this->belongsTo(DispCallBriefQuestion::class);
    }

    public function dispCallBriefAnswer()
    {
        return $this->belongsTo(DispCallBriefAnswer::class);
    }
}
