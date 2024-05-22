<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|max:6',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập Email',
            'email.email' => 'Email chưa đúng định dạng',
            'password.required' => 'Bạn chưa nhập Password',
            'password.max' => 'Mật khẩu chỉ có 6 số ',

        ];
    }
}
