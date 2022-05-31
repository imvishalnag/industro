<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DoctorAppointment;
use App\Models\RandomInfo;
use Illuminate\Http\Request;
use DataTables;
class DoctorAppointmentController extends Controller
{
    public function index()
    {
        return view('admin.appointment.doctor_list');
    }

    

    public function listAjax()
    {
        $query = DoctorAppointment::with('doctor')->select('doctor_appointments.*')->latest();

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn ='';
            
                $btn .= '<a  href="'.route('admin.doctorappointment.delete',['appointment_id'=>$row->id]).'" class="btn btn-danger">Delete</a>&nbsp';
                return $btn;
            })
            ->rawColumns(['disease','city','action'])
            ->make(true);
    }

    public function deleteAppointment($appointment_id)
    {
        DoctorAppointment::where('id', $appointment_id)->delete();
        return redirect()->back();

    }
    public function randomList()
    {
        return view('admin.appointment.random_list');
    }

    

    public function randomListAjax()
    {
        $query = RandomInfo::select('random_infos.*')->latest();

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn ='';
            
                $btn .= '<a  href="'.route('admin.random.delete_random',['random_id'=>$row->id]).'" class="btn btn-danger">Delete</a>&nbsp';
                return $btn;
            })
            ->rawColumns(['disease','city','action'])
            ->make(true);
    }

    public function deleterandom($random_id)
    {
        RandomInfo::where('id', $random_id)->delete();
        return redirect()->back();

    }
}
