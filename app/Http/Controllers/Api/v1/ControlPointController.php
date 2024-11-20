<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\ControlPointOption;
use App\Models\DispControlPoint;
use Illuminate\Http\Request;

class ControlPointController extends Controller
{
    public function index()
    {
        $controlPointOptions = ControlPointOption::all();
        return $controlPointOptions;
    }

    public function update(DispControlPoint $controlPoint, Request $request)
    {
        $controlPoint->update($request->all());
    }
}
