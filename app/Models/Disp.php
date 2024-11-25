<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'disp_reason_close_id'
    ];

//    protected function beginAt()
//    {
//        return Attribute::make(
//            get: fn (mixed $value) => Carbon::parse($value)->getTimestampMs()
//        );
//    }
//    protected function endAt()
//    {
//        return Attribute::make(
//            get: fn (mixed $value) => Carbon::parse($value)->getTimestampMs()
//        );
//    }

    public function control_points()
    {
        return $this->hasMany(DispControlPoint::class);
    }

    public function disp_status()
    {
        return $this->belongsTo(DispState::class, 'disp_state_id');
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
        return $this->hasMany(DispConcoDiag::class);
    }

    public function conco_diag_arr()
    {
        return $this->hasMany(DispConcoDiag::class)->select('conco_diag_id');
    }

    public function complications_arr()
    {
        return $this->hasMany(ComplicationDisp::class)->select('complication_id');
    }

    public function complications()
    {
        return $this->hasMany(ComplicationDisp::class);
    }

    public function lek_pr_state()
    {
        return $this->belongsTo(LekPrState::class);
    }

    public function disp_dop_health()
    {
        return $this->belongsTo(DispDopHealth::class);
    }

    public function disp_reason_close()
    {
        return $this->belongsTo(DispReasonClose::class);
    }

    public function day3()
    {
        return $this->hasOne(DispControlPoint::class)->where('control_point_id', 1);
    }

    public function mes1()
    {
        return $this->hasOne(DispControlPoint::class)->where('control_point_id', 2);
    }

    public function mes3()
    {
        return $this->hasOne(DispControlPoint::class)->where('control_point_id', 3);
    }

    public function mes6()
    {
        return $this->hasOne(DispControlPoint::class)->where('control_point_id', 4);
    }

    public function mes12()
    {
        return $this->hasOne(DispControlPoint::class)->where('control_point_id', 5);
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
