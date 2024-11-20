<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DispControlPoint extends Model
{
    protected $fillable = [
        'disp_id',
        'control_point_id',
        'control_at',
        'controled_at',
        'control_point_option_id',
    ];

    public function disp()
    {
        return $this->belongsTo(Disp::class);
    }

    public function controlPoint()
    {
        return $this->belongsTo(ControlPoint::class);
    }

    public function controlPointOption()
    {
        return $this->belongsTo(ControlPointOption::class);
    }
}
