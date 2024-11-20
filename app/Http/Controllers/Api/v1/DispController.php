<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\DispControlPoint;
use App\Models\DispState;
use App\Models\ResultCall;
use Illuminate\Http\Request;

class DispController extends Controller
{
    public function index()
    {
        $dispState = DispState::all();

        return $dispState;
    }

    public function resultCall()
    {
        $resultCall = ResultCall::all();
        return $resultCall;
    }
}