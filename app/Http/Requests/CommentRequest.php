<?php


namespace App\Http\Requests;


use System\Request\Request;

class CommentRequest extends Request
{
    public function rules()
    {
        return [
            'comment'=>'required'
        ];
    }
}