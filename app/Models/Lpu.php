<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lpu extends Model
{
    protected $fillable = [
        'full_name',
        'short_name',
        'ogrn',
        'inn',
        'kpp',
        'fio_gv',
        'tel',
        'email',
        'okpo',
        'code_mo',
    ];
}
