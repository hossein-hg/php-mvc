<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\UserRequest;
use App\Http\Services\ImageUpload;
use App\User;

class UserController extends AdminController
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    public function update($id)
    {
        $request = new UserRequest();
        $inputs = $request->all();
        $inputs['id'] = $id;
        if ($request->file('avatar')['name'])
        {

            $path = 'images/user/'.date('Y/M/d');
            $name = date('Y_m_d_H_i_s_').rand(10,99);
            $inputs['avatar'] = ImageUpload::UploadAndFitImage($request->file('avatar'),$path,$name,100,100);
        }
        User::update($inputs);
        return redirect(route('admin.user.index'));
    }
    public function changeStatus($id)
    {
        $user = User::find($id);
        if($user->is_active == 0)
        {
            $user = User::update(['id' => $id, 'is_active' => 1]);
        }
        else{
            $user = User::update(['id' => $id, 'is_active' => 0]);
        }
        return back();
    }


}