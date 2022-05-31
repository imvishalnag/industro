<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function categoryList()
   {
       return view('admin.category.category_list');
   }

   public function categoryListAjax()
   {
    $query = Category::latest();
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
              
                $btn .= '<a  href="'.route('admin.category.status',['category_id'=>$row->id,'status'=>2]).'" class="btn btn-danger">Disable</a>&nbsp;';
            }else{
                $btn .= '<a  href="'.route('admin.category.status',['category_id'=>$row->id,'status'=>1]).'" class="btn btn-danger">Enable</a>&nbsp;';

            }

            $btn .= '<a  href="'.route('admin.category.edit_form',['category_id'=>$row->id]).'" class="btn btn-primary">Edit</a>';
            return $btn;
        })
        ->rawColumns(['status', 'action'])
        ->make(true);


   }

   public function addCategoryForm()
   {
       return view('admin.category.add_category');
   }

   public function addCategory(CategoryRequest $request)
   {
        $category = new Category();
        $category->name = $request->input('category');
        if($category->save()){
            return redirect()->route('admin.category.list')->with('message','Category Added Successfully');
        }
   }

   public function editCategoryForm($category_id)
   {
       $category = Category::findOrFail($category_id);
       return view('admin.category.add_category',compact('category'));
   }

   public function updateCategory(CategoryRequest $request,$category_id)
   {
    $category = Category::findOrFail($category_id);
    $category->name = $request->input('category');
    if($category->save()){
        return redirect()->route('admin.category.list')->with('message','Category Updated Successfully');
    }
    
   }

   public function status($category_id,$status) 
   {
    
    $category = Category::findOrFail($category_id);
    $category->status = $status;
    if($category->save()){
        return redirect()->back();
    }

   }
}
