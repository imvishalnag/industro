<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\About;
use App\Services\ImageService;
use DB;
use File;
class AboutController extends Controller
{
    public function singlePost(){
        $id = 1;
        $about = About::find($id);
        return view('admin.about.about', compact('about'));
    }

    public function updatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        if($request->hasfile('image_one')){
            $image = $request->file('image_one');
            $image_one = ImageService::save($image);
        }
        if($request->hasfile('image_two')){
            $image = $request->file('image_two');
            $image_two = ImageService::save($image);              
        }
        $id = 1;
        $about = About::find($id);
        $about->description = $long_desc;    
        $about->image_one = $image_one;    
        $about->image_two = $image_two;    
        if($about->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

}
