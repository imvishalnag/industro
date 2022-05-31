<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Media;
use App\Models\What;
use App\Models\Press;
use App\Models\Video;
use App\Models\Social;
use DB;
use File;
class MediaController extends Controller
{
    public function singlePost(){
        $id = 1;
        $about = Media::find($id);
        return view('admin.about.media', compact('about'));
    }

    public function updatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $about = new Media();
        $id = 1;
        $about = Media::find($id);
        $about->description = $long_desc;    
        if($about->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }    

    public function whatsinglePost(){
        $id = 1;
        $what = What::find($id);
        return view('admin.about.what', compact('what'));
    }

    public function whatupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $what = new What();
        $id = 1;
        $what = What::find($id);
        $what->description = $long_desc;    
        if($what->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function presssinglePost(){
        $id = 1;
        $press = Press::find($id);
        return view('admin.about.press', compact('press'));
    }

    public function pressupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $press = new Press();
        $id = 1;
        $press = Press::find($id);
        $press->description = $long_desc;    
        if($press->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function videosinglePost(){
        $id = 1;
        $video = Video::find($id);
        return view('admin.about.video', compact('video'));
    }

    public function videoupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $video = new Video();
        $id = 1;
        $video = Video::find($id);
        $video->description = $long_desc;    
        if($video->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function socialsinglePost(){
        $id = 1;
        $social = Social::find($id);
        return view('admin.about.social', compact('social'));
    }

    public function socialupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $social = new Social();
        $id = 1;
        $social = Social::find($id);
        $social->description = $long_desc;    
        if($social->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

}
