<?php


namespace App\Http\Requests\Admin;


use System\Request\Request;

class galleryRequest extends Request
{
    public function rules()
    {
        return [
            'image'=>'required|file',
        ];
    }
}