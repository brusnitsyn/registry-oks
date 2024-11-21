<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Disp\UpdateControlPoint;
use App\Http\Resources\Disp\DispControlPointResource;
use App\Models\ControlPointOption;
use App\Models\DispControlPoint;
use App\Models\ResultCall;
use Illuminate\Http\Request;

class ControlPointController extends Controller
{
    public function index()
    {
        $controlPointOptions = ControlPointOption::all();
        return $controlPointOptions;
    }

    public function get(DispControlPoint $controlPoint)
    {
        return DispControlPointResource::make($controlPoint);
    }

    public function update(DispControlPoint $controlPoint, UpdateControlPoint $request)
    {
        return $request->store($controlPoint);
    }

    public function result()
    {
        $resultsCall = ResultCall::all();
        return $resultsCall;
    }
}
