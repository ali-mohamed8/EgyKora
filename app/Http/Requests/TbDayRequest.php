<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TbDayRequest extends FormRequest
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
           'day' => 'array|required|min:1',
           'day.*' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'day.array' => 'الحقل فارغ',
            'day.*.required' => 'الحقل فارغ'
        ];
    }
}
