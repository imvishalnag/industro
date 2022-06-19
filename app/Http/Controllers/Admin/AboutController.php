<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\About;
use App\Models\AboutImage;
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
        $heading = $request->input('heading');
        $text = $request->input('text');
        if($request->hasfile('image_one')){
            $image = $request->file('image_one');
            $image_one = ImageService::save($image);
            $about->image_one = $image_one; 
        }
        if($request->hasfile('image_two')){
            $image = $request->file('image_two');
            $image_two = ImageService::save($image); 
            $about->image_two = $image_two;                 
        }
        $id = 1;
        $about = About::find($id);
        $about->description = $long_desc;    
        $about->heading = $heading;    
        $about->text = $text;       
        if($about->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function aboutImages(){
        $about_image = AboutImage::all();
        // dd($about_image);
        return view('admin.about.edit_images',compact('about_image'));
    }

    public function aboutImagesAdd(Request $request)
    {
        $this->Validate($request,[
            'image' => 'required_without:id|array',
            'image.*' => 'required_without:id|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasfile('image')){
            $image = $request->file('image');
            $image_name = null;
            for ($i=0; $i < count($image); $i++) { 
                $image_name = $this->productImageSave($image[$i]);
            }               
        }
        return back()->with('message','Images Added Successfully');
    }

    public function productImageSave($image)
    {
        $page_image = new AboutImage();
        $page_image->image = ImageService::save($image);
        $page_image->save();
        return $page_image->image;
    }

    public function imageDelete($image_id)
    {
        $page_image = AboutImage::findOrFail($image_id);
        ImageService::delete($page_image->image);
        $page_image->delete();
        return back()->with('message','Images Deleted Successfully');
    }

}
