<?php


namespace App\Http\Requests\Auth;


use System\Request\Request;

class ResetPasswordRequest extends Request
{

    public function rules()
    {
        return [
            'password'=>'required|min:8',
            'new_password'=>'required|min:8'
        ];
    }
}