<?php

namespace App\Http\Requests\Pacient;

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
            'fio' => ['required', 'string'],
            'snils' => ['required', 'string'],
            'birth_at' => ['required', 'numeric'],
            'lpu_id' => ['required', 'numeric'],
            'receipt_at' => ['required', 'numeric'],
            'discharge_at' => ['nullable', 'numeric'],

            'disp.begin_at' => ['required', 'numeric'],
            'disp.end_at' => ['nullable', 'numeric'],
            'disp.main_diagnos_id' => ['required', 'numeric'],
            'disp.second_diagnos_id' => ['nullable', 'numeric'],
            'disp.disp_state_id' => ['nullable', 'numeric'],
            'disp.complications' => ['nullable', 'string'],
            'disp.lek_pr_state_id' => ['nullable', 'numeric'],
            'disp.disp_dop_health_id' => ['nullable', 'numeric'],
        ];
    }

    public function store()
    {
        $mainDiagnosId = $this->validated('disp.main_diagnos_id');
        $secondDiagnosId = $this->validated('disp.second_diagnos_id');

        $pacientData = $this->validated();

        if (isset($pacientData['birth_at'])) $pacientData['birth_at'] = Carbon::createFromTimestampMs($pacientData['birth_at'], env('APP_TIMEZONE'));
        if (isset($pacientData['receipt_at'])) $pacientData['receipt_at'] = Carbon::createFromTimestampMs($pacientData['receipt_at'], env('APP_TIMEZONE'));
        if (isset($pacientData['discharge_at'])) $pacientData['discharge_at'] = Carbon::createFromTimestampMs($pacientData['discharge_at'], env('APP_TIMEZONE'));
        if (isset($pacientData['disp']['begin_at'])) $pacientData['disp']['begin_at'] = Carbon::createFromTimestampMs($pacientData['disp']['begin_at'], env('APP_TIMEZONE'));
        if (isset($pacientData['disp']['end_at'])) $pacientData['disp']['end_at'] = Carbon::createFromTimestampMs($pacientData['disp']['end_at'], env('APP_TIMEZONE'));

        $pacient = Pacient::where('snils', $pacientData['snils'])->first();

        if (!$pacient) {
            $pacient = Pacient::create($pacientData);
        }

        $disp = $pacient->disp()->create($pacientData['disp']);

        $disp->diagnoses()->create([
            'mkb_id' => $mainDiagnosId,
            'diagnos_type_id' => 1
        ]);

        if ($secondDiagnosId) {
            $disp->diagnoses()->create([
                'mkb_id' => $secondDiagnosId,
                'diagnos_type_id' => 2
            ]);
        }

        return $pacient;
    }
}
