<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\LekPeriod;
use Illuminate\Http\Request;

class LekPeriodController extends Controller
{
    public function index()
    {
        $lekPeriod = LekPeriod::all();
        return $lekPeriod;
    }
}
