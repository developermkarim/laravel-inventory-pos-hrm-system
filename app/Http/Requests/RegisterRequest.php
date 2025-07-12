<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=> 'required|string|unique:users,name|min:3|max:30',
            'email' => 'required|email|unique:users,email',
            // 'company_name'=> 'nullable|string|max:100',
            // 'role' => 'required|in:admin,employee,hr,manager',
            'password'=> 'required|string|min:8|confirmed',
        ];
    }
}
