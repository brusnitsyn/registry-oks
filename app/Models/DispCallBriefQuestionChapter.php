<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DispCallBriefQuestionChapter extends Model
{
    protected $fillable = [
        'disp_call_brief_id',
        'name',
    ];

    public function dispCallBrief()
    {
        return $this->belongsTo(DispCallBrief::class);
    }

    public function dispCallBriefQuestions()
    {
        return $this->hasMany(DispCallBriefQuestion::class);
    }
}
