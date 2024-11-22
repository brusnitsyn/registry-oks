<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Disp\CreateDispRequest;
use App\Http\Requests\Disp\UpdateDispRequest;
use App\Http\Resources\Disp\DispEditResource;
use App\Http\Resources\Disp\DispReasonCloseResource;
use App\Models\Disp;
use App\Models\DispControlPoint;
use App\Models\DispReasonClose;
use App\Models\DispState;
use App\Models\Pacient;
use App\Models\ResultCall;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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

    public function get(Disp $disp)
    {
        return DispEditResource::make($disp);
    }

    public function create(Pacient $pacient, CreateDispRequest $request)
    {
        return $request->store($pacient);
    }

    public function reason()
    {
        $reasons = DispReasonClose::all();
        return DispReasonCloseResource::collection($reasons);
    }

    public function update(Disp $disp, UpdateDispRequest $request)
    {
        return $request->update($disp);
    }
}
