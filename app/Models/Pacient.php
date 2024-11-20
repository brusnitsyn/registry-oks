<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    protected $fillable = [
        'num',
        'fio',
        'snils',
        'tel',
        'birth_at',
        'receipt_at',
        'discharge_at',
        'lpu_id',
    ];

    protected $casts = [
        'birth_at' => 'datetime:Y-m-d',
        'receipt_at' => 'datetime:Y-m-d',
        'discharge_at' => 'datetime:Y-m-d',
    ];

    public function lpu()
    {
        return $this->belongsTo(Lpu::class);
    }

    public function disp()
    {
        return $this->hasMany(Disp::class);
    }

    public function active_disp() {
        return $this->hasOne(Disp::class)->where('end_at', null);
    }
}
