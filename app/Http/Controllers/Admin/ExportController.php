<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Export;
use App\Models\East;
use App\Models\West;
use DB;
use File;
class ExportController extends Controller
{
    public function singlePost(){
        $id = 1;
        $about = Export::find($id);
        return view('admin.about.export', compact('about'));
    }

    public function updatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        // $about = new Export();
        $long_desc = $request->input('description');
        $id = 1;
        $about = Export::find($id);
        $about->description = $long_desc;    
        if($about->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function eastsinglePost(){
        $id = 1;
        $east = East::find($id);
        return view('admin.about.east', compact('east'));
    }

    public function eastupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $east = new East();
        $id = 1;
        $east = East::find($id);
        $east->description = $long_desc;    
        if($east->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function westsinglePost(){
        $id = 1;
        $west = West::find($id);
        return view('admin.about.west', compact('west'));
    }

    public function westupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $west = new West();
        $id = 1;
        $west = West::find($id);
        $west->description = $long_desc;    
        if($west->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

}
