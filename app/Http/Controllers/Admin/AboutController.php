<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\About;
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
        $id = 1;
        $about = About::find($id);
        $about->description = $long_desc;    
        if($about->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

}
