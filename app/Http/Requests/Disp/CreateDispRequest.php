<?php

namespace App\Http\Requests\Disp;

use App\Models\Pacient;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class CreateDispRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'begin_at' => ['required'],
            'end_at' => ['nullable'],
            'main_diagnos_id' => ['required', 'numeric'],
            'conco_diagnos_id' => ['nullable', 'array'],
            'disp_state_id' => ['nullable', 'numeric'],
            'complications_id' => ['nullable', 'array'],
            'lek_pr_state_id' => ['nullable', 'numeric'],
            'disp_dop_health_id' => ['nullable', 'numeric'],
        ];
    }

    public function store(Pacient $pacient)
    {
        $data = $this->validated();
        if (isset($data['begin_at']) && is_numeric($data['begin_at'])) $data['begin_at'] = Carbon::createFromTimestampMs($data['begin_at'], config('app.timezone'))->toDateString();
        if (isset($data['end_at']) && is_numeric($data['end_at'])) $data['end_at'] = Carbon::createFromTimestampMs($data['end_at'], config('app.timezone'))->toDateString();

        $activeDisp = $pacient->active_disp()->first();

        if ($activeDisp) {
            $activeDisp->update(['end_at' => Carbon::now()]);
        }

        $disp = $pacient->disp()->create($data);

        $disp->diagnoses()->updateOrCreate(['disp_id' => $disp->id], ['mkb_id' => $data['main_diagnos_id'], 'diagnos_type_id' => 1]);

        if ($data['complications_id']) {
            foreach ($data['complications_id'] as $complication) {
                $disp->complications()->create(['complication_id' => $complication]);
            }
        }

        if ($data['conco_diagnos_id']) {
            foreach ($data['conco_diagnos_id'] as $conco) {
                $disp->conco_diag()->updateOrCreate(['conco_diag_id' => $conco]);
            }
        }

        return response()->json()->setStatusCode(201);
    }
}
