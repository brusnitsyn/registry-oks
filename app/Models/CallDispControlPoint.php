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
        return $this->hasMany(DispCallBriefQuestionAnswer::class, 'call_disp_control_point_id');
    }

    public function answers()
    {
        $array = $this->dispCallBriefQuestionAnswer()->pluck('disp_call_brief_answer_id', 'id');
//        dd($array);
        return $array; // возвращает обьект, а должен массив
//        return Arr::pluck($array, 'disp_call_brief_question_id', 'disp_call_brief_answer_id');
    }

    public function defaultBrief()
    {
        return $this->belongsTo(DispCallBrief::class, 'disp_call_brief_id');
    }
}
