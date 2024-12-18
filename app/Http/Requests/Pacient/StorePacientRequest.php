<?php

namespace App\Http\Requests\Pacient;

use App\Models\Disp;
use App\Models\Pacient;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class StorePacientRequest extends FormRequest
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
            'num' => ['nullable', 'string'],
//            'fio' => ['required', 'string'],
            'family' => ['required', 'string'],
            'name' => ['required', 'string'],
            'ot' => ['required', 'string'],
            'snils' => ['required', 'string'],
            'tel' => ['required', 'string'],
            'dop_tel' => ['required', 'string'],
            'birth_at' => ['required'],
            'lpu_id' => ['required', 'numeric'],
            'receipt_at' => ['required'],
            'discharge_at' => ['nullable'],

            'disp.id' => ['nullable', 'numeric'],
            'disp.begin_at' => ['nullable'],
            'disp.end_at' => ['nullable'],
            'disp.disp_reason_close_id' => ['nullable'],
            'disp.main_diagnos_id' => ['required', 'numeric'],
            'disp.conco_diagnos_id' => ['nullable', 'array'],
            'disp.disp_state_id' => ['nullable'],
            'disp.complications_id' => ['nullable', 'array'],
            'disp.lek_pr_state_id' => ['nullable', 'numeric'],
            'disp.lek_period_id' => ['nullable', 'numeric'],
            'disp.disp_dop_health_id' => ['nullable', 'numeric'],
        ];
    }

    public function store()
    {
        $mainDiagnosId = $this->validated('disp.main_diagnos_id');
        $concoDiagnos = $this->validated('disp.conco_diagnos_id');
        $complicationsDisp = $this->validated('disp.complications_id');

        $pacientData = $this->validated();

        if (isset($pacientData['birth_at']) && is_numeric($pacientData['birth_at'])) $pacientData['birth_at'] = Carbon::createFromTimestampMs($pacientData['birth_at'], config('app.timezone'))->toDateString();
        if (isset($pacientData['receipt_at']) && is_numeric($pacientData['receipt_at'])) $pacientData['receipt_at'] = Carbon::createFromTimestampMs($pacientData['receipt_at'], config('app.timezone'))->toDateString();
        if (isset($pacientData['discharge_at']) && is_numeric($pacientData['discharge_at'])) $pacientData['discharge_at'] = Carbon::createFromTimestampMs($pacientData['discharge_at'], config('app.timezone'))->toDateString();
        if (isset($pacientData['disp']['begin_at']) && is_numeric($pacientData['disp']['begin_at'])) $pacientData['disp']['begin_at'] = Carbon::createFromTimestampMs($pacientData['disp']['begin_at'], config('app.timezone'))->toDateString();
        if (isset($pacientData['disp']['end_at']) && is_numeric($pacientData['disp']['end_at'])) $pacientData['disp']['end_at'] = Carbon::createFromTimestampMs($pacientData['disp']['end_at'], config('app.timezone'))->toDateString();

        // Формирование ФИО
        $pacientData['fio'] = $pacientData['family'] . ' ' . $pacientData['name'] . ' ' . $pacientData['ot'];

        $pacient = Pacient::where('snils', $pacientData['snils'])->first();

        if (!$pacient) {
            $pacient = Pacient::create($pacientData);
        }

        $disp = null;
//        $pacientData['disp']['disp_state_id'] = 2; // Снят с диспансерного учета
        if (isset($pacientData['disp']['id'])) $disp = Disp::where('id', $pacientData['disp']['id'])->first();

        if (!$disp) {
            $disp = $pacient->disp()->create($pacientData['disp']);
        } else {
            $disp->update($pacientData['disp']);
        }

        $disp->diagnoses()->updateOrCreate(['disp_id' => $disp->id], ['mkb_id' => $mainDiagnosId, 'diagnos_type_id' => 1]);

        if ($complicationsDisp) {
            if ($disp->complications()->count() > 0) $disp->complications()->delete();
            foreach ($complicationsDisp as $complDisp) {
                $disp->complications()->create(['complication_id' => $complDisp]);
            }
        } else {
            $disp->complications()->delete();
        }

        if ($concoDiagnos) {
            if ($disp->conco_diag()->count() > 0) $disp->conco_diag()->delete();
            foreach ($concoDiagnos as $concoDiagId) {
                $disp->conco_diag()->create(['conco_diag_id' => $concoDiagId]);
            }
        } else {
            $disp->conco_diag()->delete();
        }

        return $pacient;
    }
}
