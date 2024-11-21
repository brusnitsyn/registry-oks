<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallDispControlPoint extends Model
{
    protected $fillable = [
        'disp_control_point_id',
        'result_call_id',
        'info_id',
    ];
}
