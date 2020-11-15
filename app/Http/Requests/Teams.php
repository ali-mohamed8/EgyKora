<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Teams extends FormRequest
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
            'team_.*.name' => 'required|string|max:100',
            'team_.*.img' => 'required_without:team_id|max:3000|mimes:jpg,jpeg,png',
        ];
    }
    public function messages()
    {
        return [
            'team_.*.name.required' => 'الخقل فارغ',
            'team_.*.name.string' => 'بيانات خاطئة',
            'team_.*.name.max' => 'بيانات خاطئة',
            'team_.*.img.required_without' => 'الخقل فارغ',
            "team_.*.img.mimes"=>'jpg,jpeg,png الصيغ المقبولة ',
            "team_.*.img.max"=>'اقصى حجم للملف 3 ميجا',


        ];
    }
}
