<?php


namespace App\Http\Requests\Admin;


use System\Request\Request;

class PostRequest extends Request
{
    public function rules()
    {

        $request = new Request();


        if (methodField() == 'post')
        {

            return [
                'title'=>'required|max:250',
                'body'=>'required|max:1000',
                'image'=>'required|file|mimes:jpeg,jpg,png,gif',
                'cat_id'=>'required|exists:categories,id',
                'published_at'=>'required|date'
            ];
        }
        else{

            return [
                'title'=>'required|max:250',
                'body'=>'required|max:10000',
                'image'=>'file|mimes:jpg,jpeg,png',
                'cat_id'=>'required|exists:categories,id',
                'published_at'=>'required|date'
            ];
        }

    }
}