<?php

namespace App\Http\Requests\FrontEnd;

use Illuminate\Foundation\Http\FormRequest;

class RequestUpdateUserrr extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current_password' => ['required'], // أزلنا current_password:web
            'password' => ['required', 'min:5', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.required' => 'Current Password is required!',
            'password.confirmed' => 'Passwords do not match!',
        ];
    }
}
