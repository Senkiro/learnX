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
        $routeName = $this->route()->getName();
        if($routeName == 'auth.login') {
            return [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ];
        }

        if ($routeName === 'auth.register') {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string| min:6',
                're_password' => 'required|string|same:password',
                'user_catalogue_id' => 'nullable|BigInteger',
            ];
        }

        return [];
    }

    public function messages(): array
    {
        $routeName = $this->route()->getName();
        if($routeName == 'auth.login') {
            return [
                'email.required' => 'Bạn chưa nhập Email',
                'email.email' => 'Email chưa đúng định dạng',
                'password.required' => 'Bạn chưa nhập Password',
                'password.min' => 'Mật khẩu phải có ít nhất 6 số ',

            ];
        }

        if ($routeName === 'auth.register') {
            return [
                'name.required' => 'Ban chua nhap ten',
                'password.required' => 'Bạn chưa nhập Password',
                'password.min' => 'Mật khẩu phải có ít nhất 6 số ',
                're_password.same' => 'Mật khẩu ko trùng khớp',
                'email.unique' => 'Email đã tồn tại',
            ];
        }
        return [];
    }
}
