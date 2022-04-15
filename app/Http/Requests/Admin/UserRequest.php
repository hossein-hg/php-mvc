<?php


namespace App\Http\Requests\Admin;


use System\Request\Request;

class UserRequest extends Request
{
    public function rules()
    {
        return [
            'first_name'=>'required',
            'last_name'=>'required',
        ];
    }
}