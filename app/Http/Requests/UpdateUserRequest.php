<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'required|string|email|unique:users,email,'.$this->id.'|max:191',
            'name' => 'required|string',
            'role_id' => 'required|integer|gt:0',

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
        ];
    }
}
