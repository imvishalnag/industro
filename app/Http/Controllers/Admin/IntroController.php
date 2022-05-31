<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Intro;
use App\Models\Chairmen;
use DB;
use File;
class IntroController extends Controller
{
    // Intro
    public function singlePost(){
        $id = 1;
        $about = Intro::find($id);
        return view('admin.homepage.intro_section', compact('about'));
    }

    public function updatePost(Request $request){
        // dd($request);
        $this->validate($request, [
            'description' => 'required',
        ]);
        
        $long_desc = $request->input('description');
        $all_service_one = $request->input('service_one');
        $all_service_one_description = $request->input('service_one_description');    
        $all_service_two = $request->input('service_two');
        $all_service_two_description = $request->input('service_two_description');
        $all_service_three = $request->input('service_three');
        $all_service_three_description = $request->input('service_three_description'); 

        $id = 1;
        $about = Intro::find($id);
        if($request->has('service_one_image')){
            $about->service_one_image = $this->addUspImages($request->file('service_one_image'));
        }
        if($request->has('service_two_image')){
            $about->service_two_image = $this->addUspImages($request->file('service_two_image'));
        }
        if($request->has('service_three_image')){
            $about->service_three_image = $this->addUspImages($request->file('service_three_image'));
        }

        $about->description = $long_desc; 
        $about->service_one = $all_service_one;
        $about->service_one_description = $all_service_one_description;
        $about->service_two = $all_service_two;
        $about->service_two_description  = $all_service_two_description ;
        $about->service_three = $all_service_three;
        $about->service_three_description = $all_service_three_description;
        if($about->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    private function addUspImages($name){
        $path = public_path().'/images/index/';
        File::exists($path) or File::makeDirectory($path, 0777, true, true);
        $path_thumb = public_path().'/images/index/thumb/';
        File::exists($path_thumb) or File::makeDirectory($path_thumb, 0777, true, true);
        
        
        $image = $name;
        $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
        //Usp Original Image
        $destinationPath =public_path().'/images/index';
        $img = Image::make($image->getRealPath());
        $img->save($destinationPath.'/'.$image_name);
        //Usp Image Thumbnail
        $destination = public_path().'/images/index/thumb';
        $img = Image::make($image->getRealPath());
        $img->resize(600, 600, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destination.'/'.$image_name);
        return $image_name;
    }

    // chairmen
    public function chairmenView(){
        $id = 1;
        $chairmen = Chairmen::find($id);
        return view('admin.homepage.chairmen_section', compact('chairmen'));
    }

    public function chairmenEdit(Request $request){
        // dd($request);
        $this->validate($request, [
            'description' => 'required',
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // $chairmen = new Chairmen();
        $id = 1;
        $chairmen = Chairmen::find($id);
        $long_desc = $request->input('description');
        $header = $request->input('title');
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $destination = base_path().'/public/images/index/';
            $image_extension = $image->getClientOriginalExtension();
            $image_name = md5(date('now').time()).".".$image_extension;
            $original_path1 = $destination.$image_name;
            Image::make($image)->save($original_path1);
            $thumb_path = base_path().'/public/images/index/thumb/'.$image_name;
            Image::make($image)
            ->resize(346, 252)
            ->save($thumb_path);
            $chairmen->image = $image_name;  
        }
        $chairmen->description = $long_desc;  
        $chairmen->title = $header;  
        if($chairmen->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }


}
