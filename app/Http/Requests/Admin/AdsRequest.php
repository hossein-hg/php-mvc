<?php


namespace App\Http\Requests\Admin;


use System\Request\Request;

class AdsRequest extends Request
{
    public function rules()
    {
        if (methodField() == 'post')
        {
            return [
                'title'=>'required|max:500',
                'description'=>'required|max:5000',
                'address'=>'required',
                'amount'=>'required',
                'image'=>'required|file|mimes:png,jpeg,jpg',
                'floor'=>'required',
                'year'=>'required',
                'storeroom'=>'required',
                'balcony'=>'required',
                'area'=>'required',
                'room'=>'required',
                'toilet'=>'required',
                'parking'=>'required',
                'tag'=>'required',
                'cat_id'=>'required',
                'sell_status'=>'required',
                'type'=>'required',
            ];
        }
        else{
            return [
                'title'=>'required|max:500',
                'description'=>'required|max:5000',
                'address'=>'required',
                'amount'=>'required',
                'image'=>'file|mimes:png,jpeg,jpg',
                'floor'=>'required',
                'year'=>'required',
                'storeroom'=>'required',
                'balcony'=>'required',
                'area'=>'required',
                'room'=>'required',
                'toilet'=>'required',
                'parking'=>'required',
                'tag'=>'required',
                'cat_id'=>'required',
                'sell_status'=>'required',
                'type'=>'required',
            ];
        }

    }
}