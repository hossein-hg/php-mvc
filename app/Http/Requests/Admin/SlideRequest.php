<?php


namespace App\Http\Requests\Admin;


use System\Request\Request;

class SlideRequest extends Request
{
    public function rules()
    {
        if (methodField() == 'post')
        {
            return [
                'title'=>'required',
                'url'=>'required',
                'amount'=>'required',
                'body'=>'required',
                'image'=>'required|file|mimes:png,jpg,jpeg',
                'address'=>'required',
            ];
        }
        else{
            return [
                'title'=>'required',
                'url'=>'required',
                'amount'=>'required',
                'body'=>'required',
                'image'=>'file|mimes:png,jpg,jpeg',
                'address'=>'required',
            ];
        }

    }
}