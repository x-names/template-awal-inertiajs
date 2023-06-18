<?php

namespace App\Http\Requests\Users;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'code' => ['required', 'string', 'max:255', 'unique:users,code'],
            // 'branch_id' => ['required', 'integer', 'exists:branches,id'],
            'phone' => ['nullable', 'string', 'max:255', 'unique:users,phone'],
            'birth_place' => ['nullable', 'string', 'max:255'],
            'birth_date' => ['nullable', 'date', 'before:' . date('Y-m-d')],
            'address' => ['nullable', 'string'],
            'gender' => ['nullable'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
