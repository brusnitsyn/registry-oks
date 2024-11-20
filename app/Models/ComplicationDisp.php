<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplicationDisp extends Model
{
    protected $fillable = [
        'disp_id',
        'complication_id',
    ];

    public function disp()
    {
        return $this->belongsTo(Disp::class);
    }

    public function complication()
    {
        return $this->belongsTo(Complication::class);
    }
}
