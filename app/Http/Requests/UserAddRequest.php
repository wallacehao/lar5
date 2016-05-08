<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserAddRequest extends Request
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
            'txtUser'           => 'required|unique:qt64_users,username',
            'txtPass'           => 'required',
            'txtConfirmPass'    => 'required|same:txtPass'
        ];
    }

    public function messages()
    {
        return [
            'txtUser.required'           => 'Please enter Username',
            'txtUser.unique'             => 'Username is exists',
            'txtPass.required'           => 'Please enter password',
            'txtConfirmPass.required'    => 'Please enter Confirm password',
            'txtConfirmPass.same'        => 'Two password not match',
        ];
    }
}
