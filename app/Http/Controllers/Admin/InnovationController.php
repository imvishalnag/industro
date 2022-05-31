<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Innovation;
use App\Models\Idea;
use App\Models\Product;
use App\Models\Service;
use DB;
use File;
class InnovationController extends Controller
{
    public function singlePost(){
        $id = 1;
        $about = Innovation::find($id);
        return view('admin.about.innovation', compact('about'));
    }

    public function updatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        // $about = new Innovation();
        $long_desc = $request->input('description');
        $id = 1;
        $about = Innovation::find($id);
        $about->description = $long_desc;    
        if($about->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function ideasinglePost(){
        $id = 1;
        $idea = Idea::find($id);
        return view('admin.about.idea', compact('idea'));
    }

    public function ideaupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $idea = new Idea();
        $id = 1;
        $idea = Idea::find($id);
        $idea->description = $long_desc;    
        if($idea->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function productsinglePost(){
        $id = 1;
        $product = Product::find($id);
        return view('admin.about.product', compact('product'));
    }

    public function productupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $product = new Product();
        $id = 1;
        $product = Product::find($id);
        $product->description = $long_desc;    
        if($product->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function servicesinglePost(){
        $id = 1;
        $service = Service::find($id);
        return view('admin.about.service', compact('service'));
    }

    public function serviceupdatePost(Request $request){
        $this->validate($request, [
            'description' => 'required',
        ]);
        $long_desc = $request->input('description');
        // $service = new Service();
        $id = 1;
        $service = Service::find($id);
        $service->description = $long_desc;    
        if($service->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

}
