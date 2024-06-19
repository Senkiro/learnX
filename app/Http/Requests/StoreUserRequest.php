<?php

namespace App\Http\Requests;

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

    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:191|unique:users',
            'name' => 'required|string',
            'role_id' => 'required|integer|gt:0',
            'password' => 'required|string| max:6',
            're_password' => 'required|string|same:password',
//            'province_id' => 'required|integer|gt:0',
//            'district_id' => 'required|integer|gt:0',
//            'ward_id' => 'required|integer|gt:0',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập Email',
            'email.unique' => 'Email đã tồn tại',
            'name.required' => 'Bạn chưa nhập Tên',
            'email.email' => 'Email chưa đúng định dạng',
            'role_id.gt' => 'Bạn chưa chọn nhóm thành viên',
            'password.required' => 'Bạn chưa nhập Password',
            're_password.required' => 'Bạn chưa nhập lại Password',
            'password.max' => 'Mật khẩu chỉ có 6 số ',
            're_password.same' => 'Mật khẩu ko trùng khớp'
        ];
    }
}
