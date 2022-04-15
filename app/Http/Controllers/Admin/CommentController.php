<?php


namespace App\Http\Controllers\Admin;


use App\Comment;
use App\Http\Requests\CommentRequest;
use System\Auth\Auth;

class CommentController extends AdminController
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comment.index',compact('comments'));
    }

    public function show($id)
    {
        $comment = Comment::find($id);
        if ($comment->parent_id != 0)
        {
            return  redirect(route('admin.comment.index'));
        }
        return view('admin.comment.show',compact('comment'));
    }

    public function approved($id)
    {
        $comment = Comment::find($id);
        if($comment->approved == 0)
        {
            $comment = Comment::update(['id' => $id, 'approved' => 1]);
        }
        else{
            $comment = Comment::update(['id' => $id, 'approved' => 0]);
        }
        return back();

    }

    public function store($parent_id)
    {
        $request = new CommentRequest();
        $inputs = $request->all();
        $parentComment = Comment::find($parent_id);
        $inputs['user_id'] = Auth::user()->id;
        $inputs['post_id'] = $parentComment->post_id;
        $inputs['approved'] = 1;
        $inputs['parent_id'] = $parentComment->id;
        $comments = Comment::where('parent_id',$parentComment->id)->get();
        $comment = '';
        foreach ($comments as $comment1)
        {
            $comment = $comment1;
        }

        if (!empty($comment))
        {
//            dd('ok');

            $inputs['id'] = $comment->id;

            Comment::update($inputs);


        }
        else{
//            dd('not ok');

            Comment::create($inputs);
        }




        return redirect(route('admin.comment.index'));

    }
}