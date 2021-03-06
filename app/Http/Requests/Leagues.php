<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Leagues extends FormRequest
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
            'name' => 'required|array|min:1',
            'name.*' => 'required|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الحقل فارغ',
            'name.*.required' => 'الحقل فارغ',
            'name.*.string' => 'بيانات خاطئة',
        ];
    }
}
