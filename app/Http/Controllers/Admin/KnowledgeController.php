<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Knowledge;
use App\Models\Activities;
use DB;
use File;
class KnowledgeController extends Controller
{
    public function caseStudySinglePost(){
        $id = 1;
        $knowledge = Knowledge::find($id);
        return view('admin.knowledge.case_study', compact('knowledge'));
    }

    public function caseStudyUpdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        $id = 1;
        $knowledge = Knowledge::find($id);
        $knowledge->description = $long_desc;    
        if($knowledge->save()){
            return redirect()->back()->with('message', 'Page Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    
    public function applicationNoteSinglePost(){
        $id = 2;
        $knowledge = Knowledge::find($id);
        // dd($knowledge);
        return view('admin.knowledge.application_note', compact('knowledge'));
    }

    public function applicationNoteUpdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        $id = 2;
        $knowledge = Knowledge::find($id);
        $knowledge->description = $long_desc;    
        if($knowledge->save()){
            return redirect()->back()->with('message', 'Page Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function productWriteupupsinglePost(){
        $id = 3;
        $knowledge = Knowledge::find($id);
        // dd($knowledge);
        return view('admin.knowledge.product_writeup', compact('knowledge'));
    }

    public function productWriteupupupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        $id = 3;
        $knowledge = Knowledge::find($id);
        $knowledge->description = $long_desc;    
        if($knowledge->save()){
            return redirect()->back()->with('message', 'Page Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function whitePapersinglePost(){
        $id = 4;
        $knowledge = Knowledge::find($id);
        // dd($knowledge);
        return view('admin.knowledge.white_paper', compact('knowledge'));
    }

    public function whitePaperupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        $id = 4;
        $knowledge = Knowledge::find($id);
        $knowledge->description = $long_desc;    
        if($knowledge->save()){
            return redirect()->back()->with('message', 'Page Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
