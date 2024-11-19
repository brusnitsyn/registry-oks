<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    protected $fillable = [
        'num',
        'fio',
        'snils',
        'birth_at',
        'receipt_at',
        'discharge_at',
        'lpu_id',
    ];

    public function lpu()
    {
        return $this->belongsTo(Lpu::class);
    }

    public function diagnoses()
    {
        return $this->hasMany(DiagnosPacient::class);
    }

    public function complications()
    {
        return $this->hasMany(Complication::class);
    }
}
