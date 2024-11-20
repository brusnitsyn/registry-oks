<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mkb extends Model
{
    protected $fillable = [
        'ds',
        'name',
        'rem',
        'begin_at',
        'end_at',
    ];
}
