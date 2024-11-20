<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DispDiagnos extends Model
{
    protected $fillable = [
        'disp_id',
        'diagnos_type_id',
        'mkb_id',
    ];

    public function diagnos_type()
    {
        return $this->belongsTo(DiagnosType::class);
    }

    public function mkb()
    {
        return $this->belongsTo(Mkb::class);
    }

    public function disp()
    {
        return $this->belongsTo(Disp::class);
    }
}
