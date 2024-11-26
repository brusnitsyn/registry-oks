<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class DispCallBrief extends Model
{
    protected $fillable = [
        'name'
    ];

    public function callDispControlPoint()
    {
        return $this->hasMany(CallDispControlPoint::class);
    }

    public function dispCallBriefQuestionChapters()
    {
        return $this->hasMany(DispCallBriefQuestionChapter::class);
    }

//    public function answers()
//    {
//        $collection = Collection::empty();
//        $charapters = $this->dispCallBriefQuestionChapters()->get();
//
//        foreach ($charapters as $charapter) {
//            foreach ($charapter->dispCallBriefQuestions()->get() as $question) {
//                $controlPoints = $this->callDispControlPoint()->get();
//                $collection->push($question);
//            }
//        }
//
//        return $collection->pluck('', 'id');
//    }
}
