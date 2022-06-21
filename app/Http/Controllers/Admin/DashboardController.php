<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\CustomerSupport;
use App\Models\Blog;
use App\Models\Forms;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Page;
use App\Models\Review;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboardView()
    {
        $total_pages = SubCategory::latest();
        $pages = SubCategory::latest()->limit(10)->get();
        $total_pages = $total_pages->count();
        $total_blogs = Blog::count();
        $total_catagory = Category::count();
        $total_product = Page::count();
        $contact = Contact::latest();
        $total_contact = $contact->count();
        $contact = $contact->limit(10)->get();
        return view('admin.dashboard',compact('total_pages','total_blogs','total_contact','contact','pages','total_catagory','total_product'));
       
    }

   
    public function changePasswordForm()
    {
        return view('admin.change_password');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'same:confirm_password'],
        ]);

        $user = Admin::where('id',1)->first();
        if(Hash::check($request->input('current_password'), $user->password)){
            Admin::where('id',1)->update([
                'password'=>Hash::make($request->input('new_password')),
            ]);
            return redirect()->back()->with('message','Password Updated Successfully');
        }else{
            return redirect()->back()->with('error','Sorry Current Password Does Not Correct');
        }
    }
    public function allList($page_slug,$page_id)
    {
        $contact = Forms::where('type',$page_id)->get();
        // dd($contact);
        
        return view('admin.contact.contact_list',compact('contact'));
    }

    public function customerSupport()
    {
        $customerSupport = CustomerSupport::first();
        // dd($customerSupport);        
        return view('admin.contact.customer_support',compact('customerSupport'));
    }

    public function customerSupportAdd(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required',
            'email' => 'required',
        ]);
        // dd($request);
        $phone = $request->input('phone');
        $email = $request->input('email');
        $id = 1;
        $customerSupport = CustomerSupport::find($id);
        $customerSupport->phone = $phone; 
        $customerSupport->email = $email; 
          
        if($customerSupport->save()){
            return redirect()->back()->with('message', 'Customer Support Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
        
        return view('admin.contact.customer_support',compact('contact'));
    }
}

