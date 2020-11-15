<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetTablesRequest extends FormRequest
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
           'tb_day_id'=>'required|unique:App\Models\ActiveTable,tbDay_id'
        ];
    }

    public function messages()
    {
        return [
            'tb_day_id.unique'=>'هذا الجدول تم اختياره فى يوم اخر'
        ];
    }
}
