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
            'conco_diagnos_id' => ['nullable', 'numeric'],
            'disp_state_id' => ['nullable', 'numeric'],
            'complications_id' => ['nullable', 'numeric'],
            'lek_pr_state_id' => ['nullable', 'numeric'],
            'disp_dop_health_id' => ['nullable', 'numeric'],
        ];
    }

    public function store(Pacient $pacient)
    {
        $data = $this->validated();
        if (isset($data['begin_at']) && is_numeric($data['begin_at'])) $data['begin_at'] = Carbon::createFromTimestampMs($data['begin_at'], env('APP_TIMEZONE'));
        if (isset($data['end_at']) && is_numeric($data['end_at'])) $data['end_at'] = Carbon::createFromTimestampMs($data['end_at'], env('APP_TIMEZONE'));

        $activeDisp = $pacient->active_disp()->first();

        if ($activeDisp) {
            $activeDisp->update(['end_at' => Carbon::now()]);
        }

        $disp = $pacient->disp()->create($data);

        $disp->diagnoses()->updateOrCreate(['disp_id' => $disp->id], ['mkb_id' => $data['main_diagnos_id'], 'diagnos_type_id' => 1]);

        if ($data['complications_id']) {
            $disp->complications()->updateOrCreate(['disp_id' => $disp->id], ['complication_id' => $data['complications_id']]);
        }

        if ($data['conco_diagnos_id']) {
            $disp->conco_diag()->updateOrCreate(['disp_id' => $disp->id], ['conco_diag_id' => $data['conco_diagnos_id']]);
        }

        return response()->json()->setStatusCode(201);
    }
}
