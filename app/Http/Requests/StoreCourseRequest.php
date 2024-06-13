<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Bạn chưa nhập tiêu đề khóa học',
            'title.string' => 'Tiêu đề khóa học phải là chuỗi ký tự',
            'title.max' => 'Tiêu đề khóa học không được vượt quá 255 ký tự',
            'description.required' => 'Bạn chưa nhập mô tả khóa học',
            'description.string' => 'Mô tả khóa học phải là chuỗi ký tự',
            'description.max' => 'Mô tả khóa học không được vượt quá 500 ký tự',
            'price.required' => 'Bạn chưa nhập giá khóa học',
            'price.numeric' => 'Giá khóa học phải là số',
            'price.min' => 'Giá khóa học phải lớn hơn hoặc bằng 0',
            'image.image' => 'Tập tin tải lên phải là hình ảnh',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB',
        ];
    }
}
