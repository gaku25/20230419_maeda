<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'=>'required|email|min:8|max:191|unique:users,email',
            'password'=>'required|min:8|max:191|confirmed|',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '・名前は必須です',
            'name.min|max'  => '・名前は8文字以上191文字以内で入力してください',
            'password.required'=>'・パスワードは必須です',
            'password.min|max'=>'・パスワードは8文字以上191文字以内で入力してください',
        ];
    }
}
