<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Contact;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InquiryController extends Controller
{

    /** Appointment List
     * @return Apppointent List 
     */
    public function appointmentList()
    {
        return view('admin.appointment.list');
    }

    /** Appointment List Ajax
     * @return Apppointent List  Ajax
    */
    public function appointmentListAjax()
    {
        $query = Appointment::with('cities','sub_categories')->select('appointments.*')->latest();

        return DataTables::eloquent($query)
            ->addIndexColumn()
            
            ->addColumn('disease', function ($row) {
                return $row->sub_categories->name;
            })
            ->addColumn('city', function ($row) {
                return $row->cities->name;
            })->addColumn('comment', function ($row) {
                return '<a  target="_blank" href="'.route('admin.appointment.view',['appointment_id'=>$row->id]).'" class="btn btn-danger">View</a>&nbsp';
            })
            ->addColumn('action', function ($row) {
                $btn ='';
            
                $btn .= '<a  href="'.route('admin.appointment.delete',['appointment_id'=>$row->id]).'" class="btn btn-danger">Delete</a>&nbsp';
                return $btn;
            })
            ->rawColumns(['disease','city','action','comment'])
            ->make(true);
    }

     /** Delete Appointment
     * @return Apppointent List 
    */
    public function deleteAppointment($appointment_id)
    {
        $appointment = Appointment::findOrFail($appointment_id);
        $appointment->delete();
        return redirect()->back();
    }

    public function contactList()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.list',compact('contacts'));
    }


    public function deleteContact($contact_id)
    {
        Contact::where('id',$contact_id)->delete();
        return redirect()->back();
    }
    
    public function view($appointment_id)
    {
        $appointment = Appointment::findOrFail($appointment_id);
        return view('admin.appointment.view',compact('appointment'));
    }
    
    public function UserList()
    {
        $user = UserDetail::latest()->get();
        return view('admin.contact.user_list',compact('user'));
    }
    
    public function deleteUser($user_id)
    {
        UserDetail::where('id',$user_id)->delete();
        return redirect()->back();
    }
}
