<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pacient\StorePacientRequest;
use App\Http\Resources\Pacient\FullPacientResource;
use App\Http\Resources\Pacient\PacientEditResource;
use App\Http\Resources\Pacient\ShortPacientCollection;
use App\Models\Pacient;
use Illuminate\Http\Request;

class PacientController extends Controller
{
    public function index(Request $request)
    {
        $query = Pacient::query();

        $searchValue = $request->query('search_value');

        $sortColumn = $request->query('sort_column', 'id');
        $sortDirection = $request->query('sort_direction', 'asc');

        if ($sortDirection === 'descend') $sortDirection = 'desc';
        else if ($sortDirection === 'ascend') $sortDirection = 'asc';
        else {
            $sortColumn = 'fio';
            $sortDirection = 'asc';
        }

        if (!is_null($searchValue)) {
            $query->where('fio', 'ilike', $searchValue . '%');
        }

        $query->orderBy($sortColumn, $sortDirection);

        $pacients = $query->paginate(30);

        return new ShortPacientCollection($pacients);
    }

    public function create(StorePacientRequest $request)
    {
        return $request->store();
    }

    public function show(Pacient $pacient)
    {
        return FullPacientResource::make($pacient);
    }

    public function edit(Pacient $pacient)
    {
        return PacientEditResource::make($pacient);
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
