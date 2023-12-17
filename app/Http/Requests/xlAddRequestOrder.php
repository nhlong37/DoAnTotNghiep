<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class xlAddRequestOrder extends FormRequest
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
            'code' => 'required',
            'fullname' => 'required',
            'address'=>'required',
            'phone'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'code.required'=> 'Chưa nhập mã hoá đơn',
            'fullname.required'=> 'Chưa nhập tên',
            'address.required'=> 'Chưa nhập địa chỉ',
            'phone.required'=>'Chưa nhập số điện thoại'
        ];
    }
}
