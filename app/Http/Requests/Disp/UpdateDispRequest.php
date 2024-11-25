<?php

namespace App\Http\Requests\Disp;

use App\Models\Disp;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class UpdateDispRequest extends FormRequest
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
            'disp_reason_close_id' => ['nullable', 'numeric'],
            'main_diagnos_id' => ['required', 'numeric'],
            'conco_diagnos_id' => ['nullable', 'array'],
            'disp_state_id' => ['nullable', 'numeric'],
            'complications_id' => ['nullable', 'array'],
            'lek_pr_state_id' => ['nullable', 'numeric'],
            'disp_dop_health_id' => ['nullable', 'numeric'],
        ];
    }

    public function update(Disp $disp)
    {
        $data = $this->validated();
        if (isset($data['begin_at']) && is_numeric($data['begin_at'])) $data['begin_at'] = Carbon::createFromTimestampMs($data['begin_at'])->toDateString();
        if (isset($data['end_at']) && is_numeric($data['end_at'])) $data['end_at'] = Carbon::createFromTimestampMs($data['end_at'])->toDateString();

        Log::info($data['begin_at']);

        if ($data['disp_state_id'] == 1) {
            $data['end_at'] = null;
            $data['disp_reason_close_id'] = null;
        }

        $disp->update($data);

        $disp->diagnoses()->updateOrCreate(['disp_id' => $disp->id], ['mkb_id' => $data['main_diagnos_id'], 'diagnos_type_id' => 1]);

        $disp->complications()->delete();
        if ($data['complications_id']) {
            foreach ($data['complications_id'] as $complication) {
                $disp->complications()->create(['complication_id' => $complication]);
            }
        }

        $disp->conco_diag()->delete();
        if ($data['conco_diagnos_id']) {
            foreach ($data['conco_diagnos_id'] as $concoDiag) {
                $disp->conco_diag()->create(['conco_diag_id' => $concoDiag]);
            }
        }

        return response()->json()->setStatusCode(200);
    }
}
