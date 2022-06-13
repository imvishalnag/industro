<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Hse;
use App\Models\SubCategory;
use App\Models\Page;
use App\Models\HomeProduct;
use DB;
use File;
class HomeProductController extends Controller
{
    public function homeProductPost(){
        $home_product = HomeProduct::oldest()->get();
        return view('admin.homepage.product',compact('home_product'));
    }
    
    public function homeProductStatusUpdate($id,$status){
        $home_product = HomeProduct::findOrFail($id);
        $home_product->status = $status;
        if($home_product->save()){
            return redirect()->back();
        }
    }

    public function homeProductEdit($id){
        $home_product = HomeProduct::findOrFail($id);
        $sub_category = SubCategory::where('cat_id', 1)->get();
        $page = Page::where('sub_cat_id',$home_product->sub_cat_id)->get();
        return view('admin.page.edit_home_product',compact('sub_category','home_product','page'));
    }

    public function findProduct($sub_cat_id){
        $page = Page::where('sub_cat_id',$sub_cat_id)->get();
        return $page;        
    }

    public function homeProductUpdate(Request $request,$id){
        $this->validate($request, [
            'sub_cat_id' => 'required',
            'product_id' => 'required',
        ]);
        // $home_product = new HomeProduct();
        $sub_cat_id = $request->input('sub_cat_id');
        $product_id = $request->input('product_id');
        $home_product = HomeProduct::find($id);
        // dd($home_product);
        $home_product->sub_cat_id = $sub_cat_id;    
        $home_product->product_id = $product_id;    
        if($home_product->save()){
            return redirect()->back()->with('message', 'Product Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

}
