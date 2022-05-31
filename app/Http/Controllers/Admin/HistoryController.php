<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\History;
use DB;
use File;
class HistoryController extends Controller
{
    public function singlePost(){
        $id = 1;
        $about = History::find($id);
        return view('admin.about.history', compact('about'));
    }

    public function updatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);        
        // $about = new History();
        $long_desc = $request->input('description');
        $id = 1;
        $about = History::find($id);
        $about->description = $long_desc;    
        if($about->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

}
