<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Image;
use File;
class SubCategoryController extends Controller
{
    public function subCategoryList()
    {
        return view('admin.subcategory.sub_category_list');
    }

    public function subCategoryListAjax()
    {
        $query = SubCategory::oldest();
        return datatables()->of($query->get())
            ->addIndexColumn()
            ->addColumn('sub_category', function ($row) {
            
                return $row->category->name;
            })
            ->addColumn('status', function ($row) {
                $btn ='';
                if($row->status ==1){
                    $btn .= '<span class="badge badge-success">Active</span>';
                
                }else{
                    $btn .= '<span class="badge badge-danger">Deactive</a>';
                }
                return $btn;
            })->addColumn('image', function ($row) {
               return '<img src="'.asset('images/subcategory/photo/'.$row->image).'" style="width:150px;height:150px;">';
            })
            ->addColumn('action', function ($row) {
                $btn ='';
                if($row->status ==1){
                
                    $btn .= '<a  href="'.route('admin.subcategory.status',['sub_cat_id'=>$row->id,'status'=>2]).'" class="btn btn-danger">Disable</a>&nbsp;';
                }else{
                    $btn .= '<a  href="'.route('admin.subcategory.status',['sub_cat_id'=>$row->id,'status'=>1]).'" class="btn btn-danger">Enable</a>&nbsp;';

                }

                $btn .= '<a  href="'.route('admin.subcategory.edit_form',['sub_cat_id'=>$row->id]).'" class="btn btn-primary">Edit Pages</a>';
                return $btn;
            })
            ->rawColumns(['status', 'sub_category','action','image'])
            ->make(true);


    }

    public function subCategorySpecificListAjax($cat_id)
    {
        $query = SubCategory::where('cat_id',$cat_id)->oldest();
        return datatables()->of($query->get())
            ->addIndexColumn()
            ->addColumn('sub_category', function ($row) {
            
                return $row->category->name;
            })
            ->addColumn('status', function ($row) {
                $btn ='';
                if($row->status ==1){
                    $btn .= '<span class="badge badge-success">Active</span>';
                
                }else{
                    $btn .= '<span class="badge badge-danger">Deactive</a>';
                }
                return $btn;
            })->addColumn('image', function ($row) {
               return '<img src="'.asset('images/subcategory/photo/'.$row->image).'" style="width:150px;height:150px;">';
            })
            ->addColumn('action', function ($row) {
                $btn ='';
                if($row->status ==1){
                
                    $btn .= '<a  href="'.route('admin.subcategory.status',['sub_cat_id'=>$row->id,'status'=>2]).'" class="btn btn-danger">Disable</a>&nbsp;';
                }else{
                    $btn .= '<a  href="'.route('admin.subcategory.status',['sub_cat_id'=>$row->id,'status'=>1]).'" class="btn btn-danger">Enable</a>&nbsp;';

                }

                $btn .= '<a  href="'.route('admin.subcategory.edit_form',['sub_cat_id'=>$row->id]).'" class="btn btn-primary">Edit Pages</a>';
                return $btn;
            })
            ->rawColumns(['status', 'sub_category','action','image'])
            ->make(true);


    }

    public function addSubCategoryForm()
    {
        $category =  Category::where('status',1)->latest()->get();
        return view('admin.subcategory.add_sub_category',compact('category'));
    }

    public function addSubCategory(SubCategoryRequest $request)
    {
            $sub_category = new SubCategory();
            $sub_category->cat_id = $request->input('category');
            $sub_category->name = $request->input('sub_category');
            if($sub_category->save()){
                return redirect()->route('admin.subcategory.list')->with('message','Sub Category Added Successfully');
            }
    }

    public function editSubCategoryForm($sub_cat_id)
    {
        $sub_category = SubCategory::findOrFail($sub_cat_id);
        $category =  Category::where('status',1)->latest()->get();
        return view('admin.subcategory.add_sub_category',compact('category','sub_category'));
    }

    public function updateSubCategory(Request $request,$sub_cat_id)
    {
        $this->validate($request,[
            'category' => ['required','numeric'],
            'sub_category'=>['required'],
            // 'image'=>['image','mimes:jpeg,jpg,png'],
        ]);
        $sub_category = SubCategory::findOrFail($sub_cat_id);
        $sub_category->name = $request->input('sub_category');
        $sub_category->cat_id = $request->input('category');
        if($sub_category->save()){
            return redirect()->route('admin.subcategory.list')->with('message','Sub Category Updated Successfully');
        }
        
    }

    public function status($sub_cat_id,$status) 
    {
        
        $sub_category = SubCategory::findOrFail($sub_cat_id);
        $sub_category->status = $status;
        if($sub_category->save()){
            return redirect()->back();
        }

    }
}
