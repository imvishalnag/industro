<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageAddRequest;
use App\Http\Requests\Admin\PageUpdateRequest;
use App\Models\Category;
// use App\Models\Cause;
// use App\Models\Faq;
// use App\Models\Overview;
use App\Models\Page;
use App\Models\ProductImage;
use App\Models\SubCategory;
use App\Models\Symptomp;
use Image;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
     /**
     * Page List
     * @return Page List View
     */

    public function pageList()
    {
        return view('admin.page.page_list');
    }
     
    /**
     * Page List
     * @return Page List Ajax
     */

    public function pageListAjax()
    {
        $query = Page::latest();
        return datatables()->of($query->get())
            ->addIndexColumn()
            
            ->addColumn('category', function ($row) {
                return $row->category->name;
            })
            ->addColumn('sub_category', function ($row) {
                return $row->subcategory->name;
            })->addColumn('status', function ($row) {
               if($row->status == 1){
                    return $btn = '<span class="badge badge-success">Enable</span>';
               }else{
                    return $btn = '<span class="badge badge-danger">Disable</span>';
               }
            })
            ->addColumn('action', function ($row) {
                $btn ='';
                // $btn .= '<a  href="" class="btn btn-danger">Preview</a>&nbsp';
                if($row->status == 2){
                    $btn .= '<a  href="'.route('admin.publish_status',['page_id'=>$row->id,'status'=>1]).'" class="btn btn-success">Enable</a>&nbsp';
                }else{
                    $btn .= '<a  href="'.route('admin.publish_status',['page_id'=>$row->id,'status'=>2]).'" class="btn btn-danger">Disable</a>&nbsp';
                }
                
                $btn .= '<a  href="'.route('admin.edit_page_form',['page_id'=>$row->id]).'" class="btn btn-primary">Edit</a>&nbsp';
                $btn .= '<a href="'.route('admin.image.list',['page_id'=>$row->id]).'" class="btn btn-xs btn-info">Edit Product Image</a>';
                
                return $btn;
            })
            ->rawColumns(['category','sub_category','action','status'])
            ->make(true);
    }
     
    /**
     * Add Page Form
     * @return Add Page View
     */

    public function addPageForm()
    {
        $category = Category::where('status',1)->get();
        return view('admin.page.add_page',compact('category'));
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

     /**
     * Insert Page
     * @return Insert Page Details
     */

    public function insertPage(PageAddRequest $request)
    {
        $page = new Page();
        $page->cat_id = $request->input('category');
        $page->sub_cat_id = $request->input('sub_category');
        $page->name = $request->input('name');
        $page->short_description = $request->input('short_description');
        $page->description = $request->input('description');
        if($page->save()){
            if($request->hasfile('image')){
                $image = $request->file('image');
                $image_name = null;
                for ($i=0; $i < count($image); $i++) { 
                    $image_name = $this->productImageSave($page,$image[$i]);
                }               
                $page->image = $image_name;
                $page->save();
            }            
            if($request->hasfile('catalog')){
                $image = $request->file('catalog');
                $image = ImageService::save($image);
                $page->catelog = $image;
                $page->save();
            }
            return redirect()->route('admin.pages.list')->with('message','Product Created Successfully');
        }
    }

    public function productImageSave(Page $page,$image)
    {
        $page_image = new ProductImage();
        $page_image->pages_id = $page->id;
        $page_image->image = ImageService::save($image);
        $page_image->save();
        return $page_image->image;
    }

    public function imageList($page_id)
    {
        $page = Page::findOrFail($page_id);
        return view('admin.page.edit_images',compact('page'));
        // dd($page);
    }

    public function imageMakeThumb($image_id)
    {
        $page_image = ProductImage::findOrFail($image_id);
        $page = Page::findOrFail($page_image->pages_id);
        $page->image = $page_image->image;
        $page->save();
        return back();
    }

    public function imageDelete($image_id)
    {
        $page_image = ProductImage::findOrFail($image_id);
        ImageService::delete($page_image->image);
        $page_image->delete();
        return back();
    }

    public function imageAddMore(Request $request)
    {
        $this->Validate($request,[
            'product_id' => 'required|numeric',
            'image' => 'required_without:id|array',
            'image.*' => 'required_without:id|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = Page::findOrFail($request->input('product_id'));
        if($request->hasfile('image')){
            $image = $request->file('image');
            $image_name = null;
            for ($i=0; $i < count($image); $i++) { 
                $image_name = $this->productImageSave($product,$image[$i]);
            }               
            // $product->image = $image_name;
            $product->save();
        }
        return back()->with('message','Images Added Successfully');
    }

     /**
     * Insert Usp Images
     * @return Insert Usp Images
     */

    private function addUspImages($name)
    {
        $path = public_path().'/images/usp/photo/';
        File::exists($path) or File::makeDirectory($path, 0777, true, true);
        $path_thumb = public_path().'/images/usp/photo/thumb/';
        File::exists($path_thumb) or File::makeDirectory($path_thumb, 0777, true, true);
        
        
        $image = $name;
        $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
        //Usp Original Image
        $destinationPath =public_path().'/images/usp/photo';
        $img = Image::make($image->getRealPath());
        $img->save($destinationPath.'/'.$image_name);
        //Usp Image Thumbnail
        $destination = public_path().'/images/usp/photo/thumb';
        $img = Image::make($image->getRealPath());
        $img->resize(600, 600, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destination.'/'.$image_name);
        return $image_name;
    }
     /**
     * Insert Banner Images
     * @return Insert Banner Images
     */

    private function addBannerImages($name)
    {
        $path = public_path().'/images/banner/photo/';
        File::exists($path) or File::makeDirectory($path, 0777, true, true);
        $path_thumb = public_path().'/images/banner/photo/thumb/';
        File::exists($path_thumb) or File::makeDirectory($path_thumb, 0777, true, true);
        
        
        $image = $name;
        $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
        //Banner Original Image
        $destinationPath =public_path().'/images/banner/photo';
        $img = Image::make($image->getRealPath());
        $img->save($destinationPath.'/'.$image_name);
        //Banner Image Thumbnail
        $destination = public_path().'/images/banner/photo/thumb';
        $img = Image::make($image->getRealPath());
        $img->resize(600, 600, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destination.'/'.$image_name);
        return $image_name;
    }

    private function addVideoImage($name)
    {
        $path = public_path().'/images/banner/photo/';
        File::exists($path) or File::makeDirectory($path, 0777, true, true);
        $path_thumb = public_path().'/images/banner/photo/thumb/';
        File::exists($path_thumb) or File::makeDirectory($path_thumb, 0777, true, true);
        
        
        $image = $name;
        $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
        //Banner Original Image
        $destinationPath =public_path().'/images/banner/photo';
        $img = Image::make($image->getRealPath());
        $img->save($destinationPath.'/'.$image_name);
        //Banner Image Thumbnail
        $destination = public_path().'/images/banner/photo/thumb';
        $img = Image::make($image->getRealPath());
        $img->resize(600, 600, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destination.'/'.$image_name);
        return $image_name;
    }
     /**
     * Insert Treatment Images
     * @return Insert Treatment Images
     */

    private function addTreatmentImages($name)
    {
        $path = public_path().'/images/treatment/photo/';
        File::exists($path) or File::makeDirectory($path, 0777, true, true);
        $path_thumb = public_path().'/images/treatment/photo/thumb/';
        File::exists($path_thumb) or File::makeDirectory($path_thumb, 0777, true, true);
        
        
        $image = $name;
        $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
        //Treatment Original Image
        $destinationPath =public_path().'/images/treatment/photo';
        $img = Image::make($image->getRealPath());
        $img->save($destinationPath.'/'.$image_name);
        //Treatment Image Thumbnail
        $destination = public_path().'/images/treatment/photo/thumb';
        $img = Image::make($image->getRealPath());
        $img->resize(600, 600, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destination.'/'.$image_name);
        return $image_name;
    }

     /**
     * Insert Overview 
     * @return Insert Overview Details
     */

    private function addOverview($page,$request)
    {
        $heading = $request->input('overview_heading');
        $desc = $request->input('overview_desc');
        for($i=0;$i<count($heading);$i++){
            $overview = new Overview();
            $overview->page_id = $page->id;
            $overview->head = $heading[$i];
            $overview->description = $desc[$i];
            $overview->save();
        }
        return 1;

    }

    /**
     * Insert Causes 
     * @return Insert Causes Details
     */

    private function addCauses($page,$request)
    {
        $title = $request->input('causes_title');

        $path = public_path().'/images/causes/photo/';
        File::exists($path) or File::makeDirectory($path, 0777, true, true);
        $path_thumb = public_path().'/images/causes/photo/thumb/';
        File::exists($path_thumb) or File::makeDirectory($path_thumb, 0777, true, true);
        
        for ($i=0; $i < count($title); $i++) {
            if($request->has('causes_image')){
                $image = $request->file('causes_image')[$i];
                $image_name = $i.microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
                //Causes Original Image
                $destinationPath =public_path().'/images/causes/photo';
                $img = Image::make($image->getRealPath());
                $img->save($destinationPath.'/'.$image_name);
                //Causes Image Thumbnail
                $destination = public_path().'/images/causes/photo/thumb';
                $img = Image::make($image->getRealPath());
                $img->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destination.'/'.$image_name);
            }

            $causes = new Cause();
            $causes->page_id = $page->id;
            $causes->name = $title[$i];
            if($request->has('causes_image')){
                $causes->image = $image_name;
            }
            $causes->save();
           
        }
        return 1;
    }

    /**
     * Insert Symptomps 
     * @return Insert Symptomps Details
     */


    // private function addSymptomps($page,$request)
    // {
    //     $title = $request->input('symp_title');

    //     $path = public_path().'/images/symtomp/photo/';
    //     File::exists($path) or File::makeDirectory($path, 0777, true, true);
    //     $path_thumb = public_path().'/images/symtomp/photo/thumb/';
    //     File::exists($path_thumb) or File::makeDirectory($path_thumb, 0777, true, true);
        
    //     for ($i=0; $i < count($title); $i++) {
    //         if($request->has('symp_image')){
    //             $image = $request->file('symp_image')[$i];
    //             $image_name = $i.microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
    //             //Symptomp Original Image
    //             $destinationPath =public_path().'/images/symtomp/photo';
    //             $img = Image::make($image->getRealPath());
    //             $img->save($destinationPath.'/'.$image_name);
    //             //Symptomp Image Thumbnail
    //             $destination = public_path().'/images/symtomp/photo/thumb';
    //             $img = Image::make($image->getRealPath());
    //             $img->resize(600, 600, function ($constraint) {
    //                 $constraint->aspectRatio();
    //             })->save($destination.'/'.$image_name);
    //         }

    //         $symptomp = new Symptomp();
    //         $symptomp->page_id = $page->id;
    //         $symptomp->name = $title[$i];
    //         if($request->has('symp_image')){
    //             $symptomp->image = $image_name;
    //         }
    //         $symptomp->save();
           
    //     }
    //     return 1;
    // }

    /**
     * Insert FAQ 
     * @return Insert FAQ Details
     */

    // private function addfaq($page,$request)
    // {
    //     $questions=$request->input('questions');
    //     $answers=$request->input('answers');
    //     for ($i=0; $i < count($questions); $i++) {
    //         $faq = new Faq();
    //         $faq->page_id = $page->id;
    //         $faq->question = $questions[$i];
    //         $faq->answer = $answers[$i];
    //         $faq->save();
    //     }
    //     return 1;
    // }

    /**
     * Edit Page 
     * @return Edit Page View
     */

     public function editPageForm($page_id)
     {
        $page_details = Page::findOrFail($page_id);
        $category = Category::where('status',1)->get();
        if($page_details){
            // $faq= Faq::where('page_id',$page_id)->get();
            // $causes = Cause::where('page_id',$page_id)->get();
            // $symptomps = Symptomp::where('page_id',$page_id)->get();
            // $overview = Overview::where('page_id',$page_id)->get();
            $sub_category = Subcategory::where('cat_id',$page_details->cat_id)->where('status',1)->get();
        }
        return view('admin.page.edit_page',compact('page_details','category','sub_category'));
     }

      /**
     * Update Page 
     * @return Update Page Details
     */

     public function updatePage(PageUpdateRequest $request,$page_id)
     {
         $page = Page::findOrfail($page_id);
         $page->cat_id = $request->input('category');
         $page->sub_cat_id = $request->input('sub_category');
         $page->name = $request->input('name');
         $page->short_description = $request->input('short_description');
         $page->description = $request->input('description');
         if($page->save()){
            if($request->hasfile('catalog')){
                $image = $request->file('catalog');
                $image = ImageService::save($image);
                $page->catelog = $image;
                $page->save();
            }
            return redirect()->back()->with('message','Product Updated Successfully');
        }
 

     }

      /**
     * Update Usp Images
     * @return Update Usp Images
     */

    // private function updateUspImages($name,$usp_page_name)
    // {
    //     $image = $name;
    //     $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
    //     //Usp Original Image
    //     $destinationPath =public_path().'/images/usp/photo';
    //     $img = Image::make($image->getRealPath());
    //     $img->save($destinationPath.'/'.$image_name);
    //     //Usp Image Thumbnail
    //     $destination = public_path().'/images/usp/photo/thumb';
    //     $img = Image::make($image->getRealPath());
    //     $img->resize(600, 600, function ($constraint) {
    //         $constraint->aspectRatio();
    //     })->save($destination.'/'.$image_name);
    //     $prev_img_delete_path = public_path() . '/images/usp/' .$usp_page_name;
    //     $prev_img_delete_path_thumb = public_path() . '/images/usp/thumb/' .$usp_page_name;
    //     if (File::exists($prev_img_delete_path)) {
    //         File::delete($prev_img_delete_path);
    //     }

    //     if (File::exists($prev_img_delete_path_thumb)) {
    //         File::delete($prev_img_delete_path_thumb);
    //     }
    //     return $image_name;
    // }

    /**
     * Update Banner Images
     * @return Update Banner Images
     */

    // private function updateBannerImages($name,$banner_image_name)
    // {
    //     $path = public_path().'/images/banner/photo/';
    //     File::exists($path) or File::makeDirectory($path, 0777, true, true);
    //     $path_thumb = public_path().'/images/banner/photo/thumb/';
    //     File::exists($path_thumb) or File::makeDirectory($path_thumb, 0777, true, true);
        
        
    //     $image = $name;
    //     $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
    //     //Banner Original Image
    //     $destinationPath =public_path().'/images/banner/photo';
    //     $img = Image::make($image->getRealPath());
    //     $img->save($destinationPath.'/'.$image_name);
    //     //Banner Image Thumbnail
    //     $destination = public_path().'/images/banner/photo/thumb';
    //     $img = Image::make($image->getRealPath());
    //     $img->resize(600, 600, function ($constraint) {
    //         $constraint->aspectRatio();
    //     })->save($destination.'/'.$image_name);
    //     $prev_img_delete_path = public_path() . '/images/banner/photo/' .$banner_image_name;
    //     $prev_img_delete_path_thumb = public_path() . '/images/banner/photo/thumb/' .$banner_image_name;
    //     if (File::exists($prev_img_delete_path)) {
    //         File::delete($prev_img_delete_path);
    //     }

    //     if (File::exists($prev_img_delete_path_thumb)) {
    //         File::delete($prev_img_delete_path_thumb);
    //     }
    //     return $image_name;
    // }

    // private function updateVideoImage($name,$video_image_name)
    // {
        
        
    //     $image = $name;
    //     $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
    //     //Banner Original Image
    //     $destinationPath =public_path().'/images/banner/photo';
    //     $img = Image::make($image->getRealPath());
    //     $img->save($destinationPath.'/'.$image_name);
    //     //Banner Image Thumbnail
    //     $destination = public_path().'/images/banner/photo/thumb';
    //     $img = Image::make($image->getRealPath());
    //     $img->resize(600, 600, function ($constraint) {
    //         $constraint->aspectRatio();
    //     })->save($destination.'/'.$image_name);
    //     $prev_img_delete_path = public_path() . '/images/banner/photo/' .$video_image_name;
    //     $prev_img_delete_path_thumb = public_path() . '/images/banner/photo/thumb/' .$video_image_name;
    //     if (File::exists($prev_img_delete_path)) {
    //         File::delete($prev_img_delete_path);
    //     }

    //     if (File::exists($prev_img_delete_path_thumb)) {
    //         File::delete($prev_img_delete_path_thumb);
    //     }
    //     return $image_name;
    // }

    /**
     * Update Treatment Images
     * @return Update Treatment Images
     */

    // private function updateTreatmentImages($name,$treatment_image_name)
    // {
    //     $path = public_path().'/images/treatment/photo/';
    //     File::exists($path) or File::makeDirectory($path, 0777, true, true);
    //     $path_thumb = public_path().'/images/treatment/photo/thumb/';
    //     File::exists($path_thumb) or File::makeDirectory($path_thumb, 0777, true, true);
        
        
    //     $image = $name;
    //     $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
    //     //Banner Original Image
    //     $destinationPath =public_path().'/images/treatment/photo';
    //     $img = Image::make($image->getRealPath());
    //     $img->save($destinationPath.'/'.$image_name);
    //     //Banner Image Thumbnail
    //     $destination = public_path().'/images/treatment/photo/thumb';
    //     $img = Image::make($image->getRealPath());
    //     $img->resize(600, 600, function ($constraint) {
    //         $constraint->aspectRatio();
    //     })->save($destination.'/'.$image_name);
    //     $prev_img_delete_path = public_path() . '/images/treatment/photo/' .$treatment_image_name;
    //     $prev_img_delete_path_thumb = public_path() . '/images/treatment/photo/thumb/' .$treatment_image_name;
    //     if (File::exists($prev_img_delete_path)) {
    //         File::delete($prev_img_delete_path);
    //     }

    //     if (File::exists($prev_img_delete_path_thumb)) {
    //         File::delete($prev_img_delete_path_thumb);
    //     }
    //     return $image_name;
    // }

     /**
     * Edit Causes 
     * @return Edit Causes View
     */

    //  public function editCausesForm($page_id)
    //  {
    //     $causes = Cause::where('page_id',$page_id)->get();
    //     $page = Page::findOrFail($page_id);
    //     return view('admin.page.edit_causes',compact('causes','page_id','page'));
    //  }

    // public function deleteCause($causes_id)
    // {
    //     $cause = Cause::findOrFail($causes_id);
    //     $prev_img_delete_path = public_path() . '/images/causes/photo/' .$cause->image;
    //     $prev_img_delete_path_thumb = public_path() . '/images/causes/photo/thumb/' .$cause->image;
    //     if (File::exists($prev_img_delete_path)) {
    //         File::delete($prev_img_delete_path);
    //     }

    //     if (File::exists($prev_img_delete_path_thumb)) {
    //         File::delete($prev_img_delete_path_thumb);
    //     }
    //     $cause->delete();
    //     return redirect()->back();
    // }

    // public function addCause(Request $request)
    // {
    //     $this->validate($request,[
    //         'title'=>'required_if:cause_check,yes',
    //         'page_id'=>'required_if:cause_check,yes|numeric',
    //         'image'=>'required_if:cause_check,yes|image|mimes:jpeg,jpg,png'
    //     ]);
    //     $page = Page::findOrFail($request->input('page_id'));
    //         $page->causes_status =1;
    //         $page->save();
    //         $cause = new Cause();
    //         $cause->page_id = $request->input('page_id');
    //         $cause->name = $request->input('title');
    //         if($cause->save()){
                
    //             $image = $request->file('image');
    //             $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
    //             //Causes Original Image
    //             $destinationPath =public_path().'/images/causes/photo';
    //             $img = Image::make($image->getRealPath());
    //             $img->save($destinationPath.'/'.$image_name);
    //             //Causes Image Thumbnail
    //             $destination = public_path().'/images/causes/photo/thumb';
    //             $img = Image::make($image->getRealPath());
    //             $img->resize(600, 600, function ($constraint) {
    //                 $constraint->aspectRatio();
    //             })->save($destination.'/'.$image_name);

            
    //             $cause->image = $image_name;
    //             $cause->save();
    //         }
       
    //     return redirect()->back();

    // }

    // public function updateCause(Request $request)
    // {
    //     $this->validate($request,[
    //         'update_title'=>'required_if:cause_check,yes',
    //         'cause_id'=>'required_if:cause_check,yes|numeric',
    //         'pages_id'=>'required_if:cause_check,yes|numeric',
    //         'update_image'=>'nullable|image|mimes:jpeg,jpg,png'
    //     ]);
    //     $page = Page::findOrFail($request->input('pages_id'));
    //     if(!empty($request->input('counter'))){
    //         $page->causes_status = 1;
    //         $page->save();

    //         $cause = Cause::findOrFail($request->input('cause_id'));
    //         $cause->name = $request->input('update_title');
    //         if($cause->save()){
    //             if($request->has('update_image')){
    //                 $image = $request->file('update_image');
    //                 $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
    //                 //Causes Original Image
    //                 $destinationPath =public_path().'/images/causes/photo';
    //                 $img = Image::make($image->getRealPath());
    //                 $img->save($destinationPath.'/'.$image_name);
    //                 //Causes Image Thumbnail
    //                 $destination = public_path().'/images/causes/photo/thumb';
    //                 $img = Image::make($image->getRealPath());
    //                 $img->resize(600, 600, function ($constraint) {
    //                     $constraint->aspectRatio();
    //                 })->save($destination.'/'.$image_name);
    //                 $prev_img_delete_path = public_path() . '/images/causes/photo/' .$cause->image;
    //                 $prev_img_delete_path_thumb = public_path() . '/images/causes/photo/thumb' .$cause->image;
    //                 if (File::exists($prev_img_delete_path)) {
    //                     File::delete($prev_img_delete_path);
    //                 }
            
    //                 if (File::exists($prev_img_delete_path_thumb)) {
    //                     File::delete($prev_img_delete_path_thumb);
    //                 }
                
                
    //                 $cause->image = $image_name;
                    
    //                 $cause->save();
    //             }
    //         }
    //     }else{
    //         $page->causes_status = 2;
    //         $page->save();
    //     }
    //     return redirect()->back();
    // }

    // public function editSymptompForm($page_id)
    // {
    //     $symptomp = Symptomp::where('page_id',$page_id)->get();
    //     $page = Page::findOrFail($page_id);
    //     return view('admin.page.edit_symptomps',compact('symptomp','page_id','page'));
    // }

    // public function deleteSymptomp($symp_id)
    // {
    //     $symp = Symptomp::findOrFail($symp_id);
    //     $prev_img_delete_path = public_path() . '/images/symtomp/photo/' .$symp->image;
    //     $prev_img_delete_path_thumb = public_path() . '/images/symtomp/photo/thumb/' .$symp->image;
    //     if (File::exists($prev_img_delete_path)) {
    //         File::delete($prev_img_delete_path);
    //     }

    //     if (File::exists($prev_img_delete_path_thumb)) {
    //         File::delete($prev_img_delete_path_thumb);
    //     }
    //     $symp->delete();
    //     return redirect()->back();
    // }


    // public function addNewSymptomps(Request $request)
    // {
    //     $this->validate($request,[
    //         'title'=>'required',
    //         'page_id'=>'required|numeric',
    //         'image'=>'required|image|mimes:jpeg,jpg,png'
    //     ]);
            
        
    //     $symp = new Symptomp();
    //     $symp->page_id = $request->input('page_id');
    //     $symp->name = $request->input('title');
    //     if($symp->save()){
    //         $image = $request->file('image');
    //         $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
    //         //Causes Original Image
    //         $destinationPath =public_path().'/images/symtomp/photo';
    //         $img = Image::make($image->getRealPath());
    //         $img->save($destinationPath.'/'.$image_name);
    //         //Causes Image Thumbnail
    //         $destination = public_path().'/images/symtomp/photo/thumb';
    //         $img = Image::make($image->getRealPath());
    //         $img->resize(600, 600, function ($constraint) {
    //             $constraint->aspectRatio();
    //         })->save($destination.'/'.$image_name);

        
    //         $symp->image = $image_name;
    //         $symp->save();
    //     }
    //     return redirect()->back();

    // }

    // public function updateSymptomps(Request $request)
    // {
    //     $this->validate($request,[
    //         'update_title'=>'required',
    //         'symp_id'=>'required|numeric',
    //         'update_image'=>'nullable|image|mimes:jpeg,jpg,png'
    //     ]);
    //     $symp = Symptomp::findOrFail($request->input('symp_id'));
        
    //     $symp->name = $request->input('update_title');
    //     if($symp->save()){
    //         if($request->has('update_image')){
    //             $image = $request->file('update_image');
    //             $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
    //             //Causes Original Image
    //             $destinationPath =public_path().'/images/symtomp/photo';
    //             $img = Image::make($image->getRealPath());
    //             $img->save($destinationPath.'/'.$image_name);
    //             //Causes Image Thumbnail
    //             $destination = public_path().'/images/symtomp/photo/thumb';
    //             $img = Image::make($image->getRealPath());
    //             $img->resize(600, 600, function ($constraint) {
    //                 $constraint->aspectRatio();
    //             })->save($destination.'/'.$image_name);
    //             $prev_img_delete_path = public_path() . '/images/symtomp/photo/' .$symp->image;
    //             $prev_img_delete_path_thumb = public_path() . '/images/symtomp/photo/thumb' .$symp->image;
    //             if (File::exists($prev_img_delete_path)) {
    //                 File::delete($prev_img_delete_path);
    //             }
        
    //             if (File::exists($prev_img_delete_path_thumb)) {
    //                 File::delete($prev_img_delete_path_thumb);
    //             }
            
            
    //             $symp->image = $image_name;
    //             $symp->save();
    //         }
    //     }
    //     $symp->save();
    //     return redirect()->back();
    // }


    // public function editfaqForm($page_id)
    // {
    //     $faq = Faq::where('page_id',$page_id)->get();
    //     $page= page::findOrFail($page_id);
    //     return view('admin.page.edit_faq',compact('faq','page_id','page'));
    // }

    // public function deleteFaq($faq_id)
    // {
    //     $faq= Faq::findOrFail($faq_id);
    //     $faq->delete();
    //     return redirect()->back();
    // }

    // public function addNewFaq(Request $request)
    // {
    //     $this->validate($request,[
    //         'page_id'=>'required|numeric',
    //         'questions'=>'required',
    //         'answers'=>'required'
    //     ]);
    //     $faq = new Faq();
    //     $faq->page_id = $request->input('page_id');
    //     $faq->question = $request->input('questions');
    //     $faq->answer = $request->input('answers');
    //     $faq->save();

    //     return redirect()->back();
    // }

    // public function updatefaq(Request $request)
    // {   
    //     $this->validate($request,[
    //         'faq_id'=>'required|numeric',
    //         'old_questions'=>'required',
    //         'old_answers'=>'required'
    //     ]);

    //     $faq = Faq::findOrFail($request->input('faq_id'));
    //     $faq->question = $request->input('old_questions');
    //     $faq->answer = $request->input('old_answers');
    //     $faq->save();
    //     return redirect()->back();
    // }

    // public function editOverviewForm($page_id)
    // {
    //     $overview = Overview::where('page_id',$page_id)->get();
    //     $page= Page::findOrFail($page_id);
    //     return view('admin.page.edit_overview',compact('page_id','overview','page'));

    // }

    // public function deleteOverview($overview_id)
    // {
    //     $overview = Overview::findOrFail($overview_id);
    //     $overview->delete();
    //     return redirect()->back();
    // }

    // public function addNewOverview(Request $request)
    // {
    //     $this->validate($request,[
    //         'new_title'=>'required',
    //         'page_id'=>'required|numeric',
    //         'new_description'=>'required'
    //     ]);
        
    //     $overview = new Overview();
    //     $overview->page_id = $request->input('page_id');
    //     $overview->head = $request->input('new_title');
    //     $overview->description = $request->input('new_description');
    //     $overview->save();
    //     return redirect()->back();

    // }

    // public function updateOverview(Request $request)
    // {
    //     $this->validate($request,[
    //         'title'=>'required',
    //         'description'=>'required',
    //         'overview_id'=>'required|numeric'
    //     ]);
    //     $overview = Overview::findOrFail($request->input('overview_id'));
    //     $overview->head = $request->input('title');
    //     $overview->description = $request->input('description');
    //     $overview->save();
    //     return redirect()->back();
    // }

    public function checkSubCategory($sub_cat_id)
    {
        $pages = Page::where('sub_cat_id',$sub_cat_id)->count();
        if($pages > 0){
            return 2;
        }else{
            return 1;
        }
    }
    
    public function checkSubCategoryUpdate($sub_cat_id,$page_id)
    {
        $pages = Page::where('sub_cat_id',$sub_cat_id)->where('id','!=',$page_id)->count();
        if($pages > 0){
            return 2;
        }else{
            return 1;
        }
    }

    public function causesStatus($page_id,$status)
    {
        Page::where('id',$page_id)->update([
            'causes_status'=>$status
        ]);
        return redirect()->back();
    }
    
    public function sympStatus($page_id,$status)
    {
        Page::where('id',$page_id)->update([
            'symptomp_status'=>$status
        ]);
        return redirect()->back();
    }
    
    public function faqStatus($page_id,$status)
    {
        Page::where('id',$page_id)->update([
            'faq_status'=>$status
        ]);
        return redirect()->back();
    }
    
    public function overviewStatus($page_id,$status)
    {
        Page::where('id',$page_id)->update([
            'overview_status'=>$status
        ]);
        return redirect()->back();
    }

    public function publishStatus($page_id,$status){
        Page::where('id',$page_id)->update([
            'status'=>$status
        ]);
        return redirect()->back();
    }

    

    
}
