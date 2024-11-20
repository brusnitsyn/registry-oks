<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Disp extends Model
{
    protected $fillable = [
        'begin_at',
        'end_at',
        'disp_state_id',
        'pacient_id',
        'lek_pr_state_id',
        'disp_dop_health_id',
    ];

    protected $casts = [
        'begin_at' => 'datetime:Y-m-d',
        'end_at' => 'datetime:Y-m-d',
    ];

    public function control_points()
    {
        return $this->hasMany(DispControlPoint::class);
    }

    public function disp_status()
    {
        return $this->belongsTo(DispState::class);
    }

    public function diagnoses()
    {
        return $this->hasMany(DispDiagnos::class);
    }

    public function main_diag()
    {
        return $this->hasOne(DispDiagnos::class)->where('diagnos_type_id', 1);
    }

    public function conco_diag()
    {
        return $this->hasOne(DispConcoDiag::class);
    }

    public function complications()
    {
        return $this->hasOne(ComplicationDisp::class);
    }

    public function lek_pr_state()
    {
        return $this->belongsTo(LekPrState::class);
    }

    public function disp_dop_health()
    {
        return $this->belongsTo(DispDopHealth::class);
    }


    protected static function booted(): void
    {
        static::created(function (Disp $disp) {
            $disp->control_points()->create([
                'control_point_id' => 1,
                'control_at' => Carbon::parse($disp->begin_at)->copy()->addDays(3)
            ]); // 3
//            $disp->control_points()->create([
//                'control_point_id' => 2,
//                'control_at' => Carbon::parse($disp->begin_at)->copy()->addDays(14)
//            ]);
            $disp->control_points()->create([
                'control_point_id' => 2,
                'control_at' => Carbon::parse($disp->begin_at)->copy()->addMonths()
            ]);
//            $disp->control_points()->create([
//                'control_point_id' => 4,
//                'control_at' => Carbon::parse($disp->begin_at)->copy()->addMonths(2)
//            ]);
            $disp->control_points()->create([
                'control_point_id' => 3,
                'control_at' => Carbon::parse($disp->begin_at)->copy()->addMonths(3)
            ]);
            $disp->control_points()->create([
                'control_point_id' => 4,
                'control_at' => Carbon::parse($disp->begin_at)->copy()->addMonths(6)
            ]);
            $disp->control_points()->create([
                'control_point_id' => 5,
                'control_at' => Carbon::parse($disp->begin_at)->copy()->addMonths(12)
            ]);
//            $disp->control_points()->create([
//                'control_point_id' => 8,
//                'control_at' => Carbon::parse($disp->begin_at)->copy()->addMonths(18)
//            ]);
//            $disp->control_points()->create([
//                'control_point_id' => 9,
//                'control_at' => Carbon::parse($disp->begin_at)->copy()->addMonths(24)
//            ]);
        });
    }
}
