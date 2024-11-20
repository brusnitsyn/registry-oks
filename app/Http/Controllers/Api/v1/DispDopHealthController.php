<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\DispDopHealth;
use Illuminate\Http\Request;

class DispDopHealthController extends Controller
{
    public function index()
    {
        $dispDopHealth = DispDopHealth::all();
        return $dispDopHealth;
    }
}
