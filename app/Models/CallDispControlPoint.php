<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallDispControlPoint extends Model
{
    protected $fillable = [
        'disp_control_point_id',
        'result_call_id',
        'info',
    ];

    public function result_call()
    {
        return $this->belongsTo(ResultCall::class);
    }

    public function disp_control_point()
    {
        return $this->belongsTo(DispControlPoint::class);
    }
}
