<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityRequest;
use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function distributorList()
    {
        $distributor = Distributor::latest()->get();
        // dd($distributor);
        return view('admin.distributor.list',compact('distributor'));
    }

    public function addDistributor()
    {
        return view('admin.distributor.add');
    }

    public function insertDistributor(Request $request)
    {
        $distributor = new Distributor;
        $distributor->name = $request->input('name');
        $distributor->link = $request->input('link');
        if($distributor->save()){
            return redirect()->route('admin.distributor.list')->with('message','Distributor Added Successfully');
        }

    }

    public function distributorDelete($distributor_id)
    {
        $distributor = Distributor::findOrFail($distributor_id);
        $distributor->delete();
        if($distributor->delete()){
            return redirect()->route('admin.distributor.list')->with('message','Distributor Deleted Successfully');
        }

        // return view('admin.distributor.add');
    }

}
