<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PacientControlPoint extends Model
{
    protected $fillable = [
        'control_point_id',
        'pacient_id'
    ];

    public function controlPoint()
    {
        return $this->belongsTo(ControlPoint::class);
    }

    public function pacient()
    {
        return $this->belongsTo(Pacient::class);
    }
}
