<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLogin extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الحقل فارغ',
            'password.required' => 'الحقل فارغ',
            'name.string' => 'يرجى ادخال بيانات صحيحة',
            'name.max' => 'يرجى ادخال بيانات صحيحة',
        ];
    }
}
