<?php


namespace App\Http\Controllers\Admin;


use App\Ads;
use App\Category;
use App\Gallery;
use App\Http\Requests\Admin\AdsRequest;
use App\Http\Requests\Admin\galleryRequest;
use App\Http\Services\ImageUpload;
use http\Env\Request;
use System\Auth\Auth;

class AdsController extends AdminController
{
    public function index()
    {

        $ads = Ads::all();
        return view('admin.ads.index', compact('ads'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('admin.ads.create',compact('categories'));
    }
    public function store()
    {
        $request = new AdsRequest();
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $path = 'images/ads/'.date('Y/M/d');
        $name = date('Y_m_d_H_i_s_').rand(10,99);
        $inputs['image'] = ImageUpload::UploadAndFitImage($request->file('image'),$path,$name,800,499);
        Ads::create($inputs);
        return redirect(route('admin.ads.index'));
    }
    public function edit($id)
    {

        $advertise = Ads::find($id);
        $categories = Category::all();
        return view('admin.ads.edit',compact(['advertise','categories']));
    }
    public function update($id)
    {

        $request = new AdsRequest();
        $inputs = $request->all();
        $inputs['user_id'] = Auth::user()->id;
        $inputs['id'] = $id;
        $advertise = Ads::find($id);
        if ($request->file('image')['name'])
        {
            if (file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$advertise->image))
            {
                unlink($_SERVER['DOCUMENT_ROOT'].'/'.$advertise->image);
            }

            $path = 'images/ads/'.date('Y/M/d');
            $name = date('Y_m_d_H_i_s_').rand(10,99);
            $inputs['image'] = ImageUpload::UploadAndFitImage($request->file('image'),$path,$name,800,499);
        }


        Ads::update($inputs);
        return redirect(route('admin.ads.index'));
    }
    public function destroy($id)
    {

        Ads::delete($id);
        return back();

    }

    public function gallery($id)
    {
        $advertise = Ads::find($id);
        $galleries = Gallery::where('advertise_id',$id)->get();
        return view('admin.ads.gallery',compact(['advertise','galleries']));

    }

    public function storeGallery($advertise_id)
    {

        $request = new galleryRequest();
        $inputs = $request->all();
        $inputs['advertise_id'] = $advertise_id;
        $path = 'images/gallery/'.date('Y/M/d');
        $name = date('Y_m_d_H_i_s_').rand(10,99);
        $inputs['image'] = ImageUpload::UploadAndFitImage($request->file('image'),$path,$name,800,499);
        Gallery::create($inputs);
        return back();

    }
    public function destroyGallery($id)
    {
        $gallery = Gallery::find($id);
//        dd($_SERVER['DOCUMENT_ROOT'].'/'.trim($gallery->image,'/ '));
        if (file_exists($_SERVER['DOCUMENT_ROOT'].'/'.trim($gallery->image,'/ ')))
        {
            unlink($_SERVER['DOCUMENT_ROOT'].'/'.trim($gallery->image,'/ '));
        }
        Gallery::delete($id);
        return back();

    }
}