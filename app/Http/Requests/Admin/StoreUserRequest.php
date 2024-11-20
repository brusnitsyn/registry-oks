<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'login' => ['required', 'string'],
            'fio' => ['required', 'string'],
            'password' => ['required', 'string'],
            'role_id' => ['required', 'integer', 'exists:roles,id'],
        ];
    }

    public function store()
    {
        $createdUser = User::create([
            $this->validated()
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Учетная запись создана'
        ])->setStatusCode(201);
    }
}
