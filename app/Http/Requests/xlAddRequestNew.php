<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class xlAddRequestNew extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tenbaiviet' => 'required',
            'noidung' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'tenbaiviet.required'=> 'Chưa nhập tên bài viết',
            'noidung.required'=> 'Chưa nhập nội dung',
        ];
    }
}
