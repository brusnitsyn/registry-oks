<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class CallDispControlPoint extends Model
{
    protected $fillable = [
        'disp_control_point_id',
        'result_call_id',
        'info',
        'disp_call_brief_id'
    ];

    public function result_call()
    {
        return $this->belongsTo(ResultCall::class);
    }

    public function disp_control_point()
    {
        return $this->belongsTo(DispControlPoint::class);
    }

    public function dispCallBriefQuestionAnswer()
    {
        return $this->hasMany(DispCallBriefQuestionAnswer::class, 'call_disp_control_point_id', 'id');
    }

    public function answers()
    {
        $array = $this->dispCallBriefQuestionAnswer()->get()->pluck('disp_call_brief_answer_id', 'disp_call_brief_question_id'); //->pluck('dispCallBriefQuestionAnswer.disp_call_brief_question_answer.id', 'id');
//        dd($array);
        return $array;
    }

    public function defaultBrief()
    {
        return $this->belongsTo(DispCallBrief::class, 'disp_call_brief_id');
    }

    public function answers_options()
    {
        $answers = collect();
        foreach ($this->defaultBrief->dispCallBriefQuestions as $question)
        {
            foreach ($question->dispCallBriefAnswers as $dispCallBriefAnswer) {
                $answers->push($dispCallBriefAnswer->only('id', 'disp_call_brief_question_id', 'has_send_smp', 'has_send_doctor', 'has_attention', 'has_need_consult_doctor'));
            }
        }

        return $answers;
    }
}
