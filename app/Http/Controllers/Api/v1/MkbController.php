<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Diagnos\ComplicationResource;
use App\Http\Resources\Diagnos\ConcoDiagnosResource;
use App\Http\Resources\Mkb\MkbResource;
use App\Models\Complication;
use App\Models\ConcoDiag;
use App\Models\Mkb;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MkbController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $query = Mkb::query();

        $query->where('end_at', '>', $now)
            ->where('begin_at', '<=', $now);

        $mkbs = $query->get();

        return MkbResource::collection($mkbs);
    }

    public function conco()
    {
        return ConcoDiagnosResource::collection(ConcoDiag::all());
    }

    public function complication()
    {
        return ComplicationResource::collection(Complication::all());
    }
}
