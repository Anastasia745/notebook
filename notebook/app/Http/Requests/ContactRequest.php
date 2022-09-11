<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules=[
            'name'=>'required',
            'phone'=>'required|unique:contacts',
            'email'=>'required',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'required'=>'Поле обязательно для заполнения',
            'unique'=>'Данные уже существуют'
        ];
    }
}
