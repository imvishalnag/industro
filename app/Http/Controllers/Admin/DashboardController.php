<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Contact;
use App\Models\Blog;
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
}

