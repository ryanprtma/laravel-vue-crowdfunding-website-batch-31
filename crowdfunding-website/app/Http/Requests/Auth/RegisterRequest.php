<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|unique:users,email|email',
            'no_hp' => 'required',
            'username' => 'required|unique:users,username|alpha_num|min:3|max:25',
            'name' => 'required',
            'password' => 'required|confirmed|min:6'
        ];
    }
}
