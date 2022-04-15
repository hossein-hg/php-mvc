<?php


namespace App\Http\Controllers\Admin;


use App\Category;
use App\Http\Requests\Admin\CategoryRequest;
use System\Request\Request;

class CategoryController extends AdminController
{
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->get();

        return view('admin.category.index',compact('categories'));
    }
    public function create()
    {
        $categories = Category::where('parent_id','=',0)->get();
        return view('admin.category.create',compact('categories'));
    }
    public function store()
    {
        $request = new CategoryRequest();
        $inputs = $request->all();

        Category::create($inputs);

        return redirect(route('admin.category.index'));
    }
    public function edit($id)
    {
        $categories = Category::where('parent_id','=',0)->get();
        $category = Category::find($id);
        return view('admin.category.edit',compact(['categories','category']));
    }
    public function update($id)
    {
        $request = new CategoryRequest();
        $inputs = $request->all();
//        if(empty($request->parent_id)) unset($inputs['parent_id']);
        Category::update(array_merge($inputs, ['id' => $id]));
        return redirect('admin/category');
    }
    public function destroy($id)
    {
        Category::delete($id);
        return back();

    }

}