<?php


namespace App\Http\Requests\Auth;


use System\Request\Request;

class LoginRequest extends Request
{
        protected function rules()
        {
            return [
                'email'=>'required|max:100|email',
                'password'=>'required',

            ];
        }
}