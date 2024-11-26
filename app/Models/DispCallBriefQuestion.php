<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DispCallBriefQuestion extends Model
{
    protected $fillable = [
        'disp_call_brief_question_chapter_id',
        'question',
    ];

    public function dispCallBriefQuestionChapter()
    {
        return $this->belongsTo(DispCallBriefQuestionChapter::class);
    }

    public function dispCallBriefAnswers()
    {
        return $this->hasMany(DispCallBriefAnswer::class);
    }
}
