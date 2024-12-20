<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosPacient extends Model
{
    protected $fillable = [
        'mkb_id',
        'diagnos_type_id',
        'pacient_id'
    ];

    public function diagnos_type()
    {
        return $this->belongsTo(DiagnosType::class);
    }

    public function mkb()
    {
        return $this->belongsTo(Mkb::class);
    }

    public function pacient()
    {
        return $this->belongsTo(Pacient::class);
    }
}
