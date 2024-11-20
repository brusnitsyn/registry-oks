<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Mkb;
use Illuminate\Http\Request;

class MkbController extends Controller
{
    public function index()
    {
        $mkb = Mkb::all();
        return $mkb;
    }
}
