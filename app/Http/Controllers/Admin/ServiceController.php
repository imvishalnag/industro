<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\HomeService;
use App\Models\SubCategory;
use DB;
use File;
class ServiceController extends Controller
{
    // Intro
    public function webServiceList(){        
        $service = HomeService::orderBy('id')->get();
        $categories = Category::with('subcategory')->withCount('subcategory')->get()->map(function($category){
            $category->subcategory->map(function($subcategory){
                $subcategory->page_count = $subcategory->pages->count();
            });
            return $category;
        });
        return view('admin.homepage.services',compact('service','categories'));
    }
    public function webServiceAddForm(){
        $category = Category::where('status',1)->get();
        $sub_category = SubCategory::where('status',1)->get();
        return view('admin.homepage.edit_services',compact('category','sub_category'));
    }

    /**
     * Fetch Subcategory Against Category
     * @return sub_category
     */

    public function findSubCategory($cat_id)
    {
        $sub_category = SubCategory::where('cat_id',$cat_id)->where('status',1)->get();
        return $sub_category;        
    }


    public function insertWebService(Request $request){
        // dd($request);
        $this->validate($request, [
            'category' => 'required',
            'sub_category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $service = new HomeService();
        $category = $request->input('category');
        $sub_category = $request->input('sub_category');
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $destination = base_path().'/public/images/index/service/';
            $image_extension = $image->getClientOriginalExtension();
            $image_name = md5(date('now').time()).".".$image_extension;
            $original_path1 = $destination.$image_name;
            Image::make($image)->save($original_path1);
            $thumb_path = base_path().'/public/images/index/service/thumb/'.$image_name;
            Image::make($image)
            ->resize(346, 252)
            ->save($thumb_path);
        }        
        $service->cat_id = $category;  
        $service->sub_cat_id = $sub_category;  
        $service->image = $image_name;  
        if($service->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function webServiceEdit($id)
    {
        $category = Category::where('status',1)->get();        
        $sub_category = SubCategory::where('status',1)->get();
        $service = HomeService::findOrFail($id);
        return view('admin.homepage.edit_services',compact('category','service','sub_category'));
    }

    public function webServiceUpdate(Request $request,$id){
        // dd($request); 
        $service = HomeService::findOrFail($id);
        $category = $request->input('category');
        $sub_category = $request->input('sub_category');
        if($request->hasfile('image')){  
            $image = $request->file('image');
            $destination = base_path().'/public/images/index/service/';
            $image_extension = $image->getClientOriginalExtension();
            $image_name = md5(date('now').time()).".".$image_extension;
            $original_path = $destination.$image_name;
            Image::make($image)->save($original_path);
            $thumb_path = base_path().'/public/images/index/service/thumb/'.$image_name;
            Image::make($image)
            ->resize(346, 252)
            ->save($thumb_path);

            $path = public_path() . '/public/images/index/service/' . $service->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $path_thumb = public_path() . '/public/images/index/service/thumb/' . $service->image;
            if (File::exists($path_thumb)) {
                File::delete($path_thumb);
            }

            $service->image = $image_name;
        }  
        $service->cat_id = $category;  
        $service->sub_cat_id = $sub_category;  
        if($service->save()){
            return redirect()->back()->with('message', 'Post Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }


}
