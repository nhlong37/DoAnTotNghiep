<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class xlAddRequestSize extends FormRequest
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
            'tensize' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'tensize.required'=> 'Chưa nhập kích thước',
        ];
    }
}
