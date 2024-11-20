<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DispConcoDiag extends Model
{
    protected $fillable = [
        'disp_id',
        'conco_diag_id'
    ];

    public function disp()
    {
        return $this->belongsTo(Disp::class);
    }

    public function conco_diag()
    {
        return $this->belongsTo(ConcoDiag::class);
    }
}
