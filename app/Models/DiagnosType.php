<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosType extends Model
{
    protected $fillable = [
        'code',
        'name',
        'begin_at',
        'end_at',
    ];
}
