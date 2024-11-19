<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplicationPacient extends Model
{
    protected $fillable = [
        'complication_id',
        'pacient_id',
    ];
}
