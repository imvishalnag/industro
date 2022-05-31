<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function cityList()
    {
        return view('admin.city.city_list');
    }

    public function cityListAjax()
    {
        $query = City::latest();
        return datatables()->of($query->get())
            ->addIndexColumn()
            
            ->addColumn('status', function ($row) {
                $btn ='';
                if($row->status ==1){
                    $btn .= '<span class="badge badge-success">Active</span>';
                
                }else{
                    $btn .= '<span class="badge badge-danger">Deactive</a>';
                }
                return $btn;
            })
            ->addColumn('action', function ($row) {
                $btn ='';
                if($row->status ==1){
                
                    $btn .= '<a  href="'.route('admin.city.status',['city_id'=>$row->id,'status'=>2]).'" class="btn btn-danger">Disable</a>&nbsp;';
                }else{
                    $btn .= '<a  href="'.route('admin.city.status',['city_id'=>$row->id,'status'=>1]).'" class="btn btn-danger">Enable</a>&nbsp;';

                }

                $btn .= '<a  href="'.route('admin.city.edit_form',['city_id'=>$row->id]).'" class="btn btn-primary">Edit</a>';
                return $btn;
            })
            ->rawColumns(['status','action'])
            ->make(true);


    }

    public function addCityForm()
    {
        return view('admin.city.add_city');
    }

    public function addCity(CityRequest $request)
    {
            $city = new City();
            $city->name = $request->input('city');
            if($city->save()){
                return redirect()->back()->with('message','City Added Successfully');
            }
    }

    public function editCityForm($city_id)
    {
        $city =  City::findOrFail($city_id);
        return view('admin.city.add_city',compact('city'));
    }

    public function updateCity(CityRequest $request,$city_id)
    {
        $city = City::findOrFail($city_id);
        $city->name = $request->input('city');
        if($city->save()){
            return redirect()->back()->with('message','City Updated Successfully');
        }
        
    }

    public function status($city_id,$status) 
    {
        
        $city = City::findOrFail($city_id);
        $city->status = $status;
        if($city->save()){
            return redirect()->back();
        }

    }
}
