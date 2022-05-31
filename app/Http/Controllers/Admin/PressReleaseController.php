<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PressRelease;
use Illuminate\Http\Request;
use File;
use Image;
class PressReleaseController extends Controller
{
    public function list()
    {
        $press_releases = PressRelease::latest()->get();
        return view('admin.press.list',compact('press_releases'));
    }

    public function addForm()
    {
        return view('admin.press.add');
    }

    public function insert(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'image'=>'required|image|mimes:jpg,jpeg,png',
            'short_desc'=>'required',
            'long_desc'=>'required',
        ]);

        $press = new PressRelease();
        $press->title = $request->input('name');
        $press->short_desc = $request->input('short_desc');
        $press->long_desc = $request->input('long_desc');
        if($press->save()){
            if($request->has('image')){
                $path = public_path().'/images/press/photo/';
                File::exists($path) or File::makeDirectory($path, 0777, true, true);
                $path_thumb = public_path().'/images/press/photo/thumb/';
                File::exists($path_thumb) or File::makeDirectory($path_thumb, 0777, true, true);
                
                
                $image = $request->file('image');
                $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
                //Usp Original Image
                $destinationPath =public_path().'/images/press/photo';
                $img = Image::make($image->getRealPath());
                $img->save($destinationPath.'/'.$image_name);
                //Usp Image Thumbnail
                $destination = public_path().'/images/press/photo/thumb';
                $img = Image::make($image->getRealPath());
                $img->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destination.'/'.$image_name);
                $press->image = $image_name;
                $press->save();
            }
        }
        return redirect()->route('admin.pressrelease.list')->with('message','Success');
    }

    public function delete($press_id){
        $press = PressRelease::findOrFail($press_id);
        $prev_img_delete_path = public_path() . '/images/press/photo/' .$press->image;
        $prev_img_delete_path_thumb = public_path() . '/images/press/photo/thumb/' .$press->image;
        if (File::exists($prev_img_delete_path)) {
            File::delete($prev_img_delete_path);
        }

        if (File::exists($prev_img_delete_path_thumb)) {
            File::delete($prev_img_delete_path_thumb);
        }
        $press->delete();
        return redirect()->back();
    }

    public function view($press_id)
    {
        $press = PressRelease::findOrFail($press_id);

        return view('admin.press.view',compact('press'));
    }
}
