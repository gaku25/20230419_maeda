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
            'email.required' => '・メールアドレスは必須です',
            'email.email' => '・メールアドレスの形式で入力してください',
            'email.unique' => 'このメールアドレスは登録済みです',
            'email.min' => '・メールアドレスは8文字以上入力してください',
            'email.max' => '・メールアドレスは191文字以内で入力してください',
            'password.required' => '・パスワードは必須です',
            'password.confirmed' => '・パスワードと確認用パスワードが一致しません',
            'password.min' => '・パスワードは8文字以上入力してください',
            'password.max' => '・パスワードは191文字以内で入力してください',
        ];
    }
}
