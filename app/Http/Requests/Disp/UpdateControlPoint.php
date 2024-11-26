<?php

namespace App\Http\Requests\Disp;

use App\Models\DispCallBriefQuestionAnswer;
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
                'brief_answers' => ['nullable', 'array']
            ],
            'brief' => [
                'id' => ['nullable', 'numeric'],
            ],
        ];
    }

    public function store(DispControlPoint $controlPoint)
    {
        $cpv = $this->validated('control_point');
        $call = $this->validated('call');
        $brief = $this->validated('brief');

        $controlPoint->update($cpv);

        $controlPoint->calls()->updateOrCreate(
            ['id' => $controlPoint['id']],
            $call,
        );

        if (isset($brief) && isset($call['brief_answers'])) {
            foreach ($call['brief_answers'] as $questionId => $answerId) {
                if (!is_null($answerId)) {
                    DispCallBriefQuestionAnswer::updateOrCreate(
                        [
                            'disp_id' => $controlPoint->disp->id,
                            'call_disp_control_point_id' => $controlPoint['id'],
                            'disp_call_brief_id' => $brief['id'],
                            'disp_call_brief_question_id' => $questionId,
                        ],
                        [
                            'disp_id' => $controlPoint->disp->id,
                            'call_disp_control_point_id' => $controlPoint['id'],
                            'disp_call_brief_id' => $brief['id'],
                            'disp_call_brief_question_id' => $questionId,
                            'disp_call_brief_answer_id' => $answerId,
                        ]
                    );
                }
            }
        }

        return response()->json($controlPoint)->setStatusCode(200);
    }
}
