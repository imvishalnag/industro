<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Career;
use App\Models\Investor;
use App\Models\Partner;
use App\Models\Employee;
use DB;
use File;
class CareerController extends Controller
{
    public function singlePost(){
        $id = 1;
        $about = Career::find($id);
        return view('admin.about.career', compact('about'));
    }

    public function updatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        // $about = new Career();
        $long_desc = $request->input('description');
        $id = 1;
        $about = Career::find($id);
        $about->description = $long_desc;    
        if($about->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function investorsinglePost(){
        $id = 1;
        $investor = Investor::find($id);
        return view('admin.about.investor', compact('investor'));
    }

    public function investorupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $investor = new Investor();
        $id = 1;
        $investor = Investor::find($id);
        $investor->description = $long_desc;    
        if($investor->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function partnersinglePost(){
        $id = 1;
        $partner = Partner::find($id);
        return view('admin.about.partner', compact('partner'));
    }

    public function partnerupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $partner = new Partner();
        $id = 1;
        $partner = Partner::find($id);
        $partner->description = $long_desc;    
        if($partner->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function employeesinglePost(){
        $id = 1;
        $employee = Employee::find($id);
        return view('admin.about.employee', compact('employee'));
    }

    public function employeeupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $employee = new Employee();
        $id = 1;
        $employee = Employee::find($id);
        $employee->description = $long_desc;    
        if($employee->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

}
