<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Slider;
use DB;
use File;

class SliderController extends Controller
{
    public function webSliderList(){
        $slider = Slider::orderBy('id','desc')->get();
        return view('admin.homepage.slider', compact('slider'));
    }

    public function webSliderAddForm(){
        return view('admin.homepage.add_slider');
    }

    public function insertWebSlider(Request $request){
        $this->validate($request, [
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $chairmen = new Slider();
        $long_desc = $request->input('description');
        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $destination = base_path().'/public/images/banner/';
            $image_extension = $image->getClientOriginalExtension();
            $image_name = md5(date('now').time()).".".$image_extension;
            $original_path = $destination.$image_name;
            Image::make($image)->save($original_path);
            $thumb_path = base_path().'/public/images/banner/thumb/'.$image_name;
            Image::make($image)
            ->resize(346, 252)
            ->save($thumb_path);
        }
        // $id = 1;
        // $chairmen = Chairmen::find($id);
        $chairmen->description = $long_desc;  
        $chairmen->image = $image_name;  
        if($chairmen->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function deletePost($id){
        $post = Slider::find($id);
        if($post->delete()){
            if(File::exists(public_path().'/public/images/banner/'.$post->image)){
                File::delete(public_path().'/public/images/banner/'.$post->image);
            }

            if(File::exists(public_path().'/public/images/banner/thumb/'.$post->image)){
                File::delete(public_path().'/public/images/banner/thumb/'.$post->image);
            }
                return redirect()->back()->with('message', 'Blog Deleted Successfully');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
