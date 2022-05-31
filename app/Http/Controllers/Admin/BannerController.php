<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Banner;
use DB;
use File;
class BannerController extends Controller
{

    // chairmen
    public function bannerView(){
        $id = 1;
        $banner = Banner::find($id);
        return view('admin.homepage.banner_section', compact('banner'));
    }

    public function bannerEdit(Request $request){
        $this->validate($request, [
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $long_desc = $request->input('description');
        // $chairmen = new Banner();
        $id = 1;
        $chairmen = Banner::find($id);
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $destination = base_path().'/public/images/hero/';
            $image_extension = $image->getClientOriginalExtension();
            $image_name = md5(date('now').time()).".".$image_extension;
            $original_path1 = $destination.$image_name;
            Image::make($image)->save($original_path1);
            $thumb_path = base_path().'/public/images/hero/thumb/'.$image_name;
            Image::make($image)
            ->resize(346, 252)
            ->save($thumb_path);
            $chairmen->image = $image_name;  
        }
        $chairmen->description = $long_desc;  
        if($chairmen->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }


}
