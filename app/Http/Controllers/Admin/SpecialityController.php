<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function index()
    {
        $specialities = Speciality::latest()->get();
        return view('admin.speciality.index',compact('specialities'));
    }

    public function create()
    {
        return view('admin.speciality.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'speciality' =>'required'
        ]);
        $count = Speciality::where('name',strtolower($request->input('speciality')))->count();
        if($count > 0){
            return redirect()->back()->with('error','Speciality Already Exist!');
        }else{
            $speciality = new Speciality();
            $speciality->name =strtolower( $request->input('speciality'));
            if($speciality->save()){
                return redirect()->back()->with('message','Added Successfully');
            }
        }
    }

    public function edit($speciality_id)
    {
        $speciality = Speciality::findOrFail($speciality_id);
        return view('admin.speciality.create',compact('speciality'));
    }

    public function update(Request $request,$speciality_id)
    {
        $this->validate($request,[
            'speciality' =>'required'
        ]);

        $count = Speciality::where('name',strtolower($request->input('speciality')))->where('id','!=',$speciality_id)->count();
        if($count > 0){
            return redirect()->back()->with('error','Speciality Already Exist!');
        }else{
            $speciality = Speciality::findOrFail($speciality_id);
            $speciality->name =strtolower( $request->input('speciality'));
            if($speciality->save()){
                return redirect()->back()->with('message','Updated Successfully');
            }
        }
    }

    public function status($speciality_id)
    {
        $speciality = Speciality::findOrFail($speciality_id);
        $speciality->status = $speciality->status ==1?2:1;
        $speciality->save();
        return redirect()->back();
    }
}
