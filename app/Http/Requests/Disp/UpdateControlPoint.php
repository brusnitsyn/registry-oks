<?php

namespace App\Http\Requests\Disp;

use App\Models\DispControlPoint;
use Illuminate\Foundation\Http\FormRequest;

class UpdateControlPoint extends FormRequest
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
            'control_point' => [
                'id' => ['nullable', 'numeric'],
                'control_point_option_id' => ['required', 'integer'],
            ],
            'call' => [
                'result_call_id' => ['required', 'numeric'],
                'info' => ['nullable', 'string'],
            ]
        ];
    }

    public function store(DispControlPoint $controlPoint)
    {
        $cpv = $this->validated('control_point');
        $call = $this->validated('call');

        $controlPoint->update($cpv);

        $controlPoint->calls()->updateOrCreate(
            ['id' => $controlPoint['id']],
            $call,
        );

        return response()->json($controlPoint)->setStatusCode(200);
    }
}
