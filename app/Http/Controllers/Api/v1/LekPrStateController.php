<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\LekPrState;
use Illuminate\Http\Request;

class LekPrStateController extends Controller
{
    public function index()
    {
        $lekPrState = LekPrState::all();
        return $lekPrState;
    }
}
