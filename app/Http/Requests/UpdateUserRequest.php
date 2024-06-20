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
            'role_ids' => 'required|array',
            'role_ids.*' => 'exists:roles,id',

        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập Email',
            'email.unique' => 'Email đã tồn tại',
            'name.required' => 'Bạn chưa nhập Tên',
            'email.email' => 'Email chưa đúng định dạng',
            'role_ids.gt' => 'Bạn chưa chọn nhóm thành viên',
        ];
    }
}
