<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoVanBanRequest extends FormRequest
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
            'ten_viet_tat'=>'unique:so_van_ban,ten_viet_tat'
        ];
    }

    public function messages()
    {
        return [
            'ten_viet_tat.unique'=>'Tên viết tắt của sổ bị trùng !'
        ];
    }

}
