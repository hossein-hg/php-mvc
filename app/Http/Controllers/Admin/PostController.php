<?php


namespace App\Http\Controllers\Admin;


use App\Category;
use App\Http\Requests\Admin\PostRequest;
use App\Http\Services\ImageUpload;
use App\Post;
use System\Auth\Auth;

class PostController extends AdminController
{
    public function index()
    {

        $posts = Post::orderBy('id','DESC')->get();

        return view('admin.post.index',compact(['posts']));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create',compact('categories'));
    }
    public function store()
    {
        $request = new PostRequest();
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $path = 'images/posts/'.date('Y/M/d');
        $name = date('Y_m_d_H_i_s_').rand(10,99);
        $file = $request->file('image');
        $inputs['image'] = ImageUpload::UploadAndFitImage($request->file('image'),$path,$name,800,499);
        Post::create($inputs);
        return redirect(route('admin.post.index'));
    }
    public function edit($id)
    {

        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.post.edit',compact(['post','categories']));
    }
    public function update($id)
    {

        $request = new PostRequest();
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $inputs['id'] = $id;
        $post = Post::find($id);
        if ($request->file('image')['name'])
        {
            if (file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$post->image))
            {
                unlink($_SERVER['DOCUMENT_ROOT'].'/'.$post->image);
            }

            $path = 'images/posts/'.date('Y/M/d');
            $name = date('Y_m_d_H_i_s_').rand(10,99);
            $file = $request->file('image');
            $inputs['image'] = ImageUpload::UploadAndFitImage($request->file('image'),$path,$name,800,499);
        }


        Post::update($inputs);
        return redirect(route('admin.post.index'));
    }
    public function destroy($id)
    {

        Post::delete($id);
        return back();

    }

}