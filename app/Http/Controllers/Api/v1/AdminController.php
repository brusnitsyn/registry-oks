<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function createUser(StoreUserRequest $request)
    {
        return $request->store();
    }

    public function updateUser()
    {

    }
}
