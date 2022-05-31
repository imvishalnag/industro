<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Csr;
use App\Models\Health;
use App\Models\Safety;
use App\Models\Enviroment;
use App\Models\Activities;
use DB;
use File;
class CsrController extends Controller
{
    public function singlePost(){
        $id = 1;
        $about = Csr::find($id);
        return view('admin.about.csr', compact('about'));
    }

    public function updatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        // $about = new Csr();
        $long_desc = $request->input('description');
        $id = 1;
        $about = Csr::find($id);
        $about->description = $long_desc;    
        if($about->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    
    public function healthsinglePost(){
        $id = 1;
        $health = Health::find($id);
        return view('admin.about.health', compact('health'));
    }

    public function healthupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $health = new Health();
        $id = 1;
        $health = Health::find($id);
        $health->description = $long_desc;    
        if($health->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function safetysinglePost(){
        $id = 1;
        $safety = Safety::find($id);
        return view('admin.about.safety', compact('safety'));
    }

    public function safetyupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $safety = new Safety();
        $id = 1;
        $safety = Safety::find($id);
        $safety->description = $long_desc;    
        if($safety->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function enviromentsinglePost(){
        $id = 1;
        $enviroment = Enviroment::find($id);
        return view('admin.about.enviroment', compact('enviroment'));
    }

    public function enviromentupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $enviroment = new Enviroment();
        $id = 1;
        $enviroment = Enviroment::find($id);
        $enviroment->description = $long_desc;    
        if($enviroment->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function activitiessinglePost(){
        $id = 1;
        $activities = Activities::find($id);
        return view('admin.about.activities', compact('activities'));
    }

    public function activitiesupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $activities = new Activities();
        $id = 1;
        $activities = Activities::find($id);
        $activities->description = $long_desc;    
        if($activities->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
