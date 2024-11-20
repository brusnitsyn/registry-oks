<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Lpu;
use Illuminate\Http\Request;

class LpuController extends Controller
{
    public function index()
    {
        $lpu = Lpu::all();

        return $lpu;
    }
}
