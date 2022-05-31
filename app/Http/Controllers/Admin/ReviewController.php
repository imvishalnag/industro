<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Review\AddReviewRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use File;
use Image;

class ReviewController extends Controller
{
    /** Review List
     * @return Review List 
     */
    public function reviewList()
    {
        return view('admin.review.list');
    }

    /** Review List Ajax
     * @return Review List  Ajax
    */
    public function reviewListAjax()
    {
        $query = Review::latest();
        return datatables()->of($query->get())
            ->addIndexColumn()
            ->addColumn('status', function ($row) {
                if($row->status == 1){
                    return $btn = '<span class="badge badge-success">Enabled</span>';
               }else{
                    return $btn = '<span class="badge badge-warning">Disabled</span>';
               }
            })
            ->addColumn('action', function ($row) {
                $btn ='';
                $btn .= '<a  href="'.route('admin.review.delete',['review_id'=>$row->id]).'" class="btn btn-danger">Delete</a>&nbsp';
                $btn .= '<a  href="'.route('admin.review.edit_form',['review_id'=>$row->id]).'" class="btn btn-success">Edit</a>&nbsp';
                if($row->status == 1){
                    $btn .= '<a  href="'.route('admin.review.status',['review_id'=>$row->id,'status'=>2]).'" class="btn btn-primary">Disable</a>&nbsp';
                }else{
                    $btn .= '<a  href="'.route('admin.review.status',['review_id'=>$row->id,'status'=>1]).'" class="btn btn-warning">Enable</a>&nbsp';
                }
                $btn .= '<a  target="_blank" href="'.route('admin.review.view',['review_id'=>$row->id]).'" class="btn btn-warning">View</a>&nbsp';
                return $btn;
            })
            ->rawColumns(['status','action'])
            ->make(true);
    }

    /** Review Add Form
     * @return Review Add  Review View
    */
    public function addReviewForm()
    {
        return view('admin.review.add_review_form');
    }

    /** Insert Review
     * @return Review Insert
    */
    public function insertReview(AddReviewRequest $request)
    {
        $review = new Review();
        $status =1;
        $this->reviewOperation($review,$request,$status);
        return redirect()->route('admin.review.list')->with('message','Review Added Successfully');
    }

    
    private function reviewOperation($review,$request,$status)
    {
        $review->name = $request->input('name');
        $review->description = $request->input('description');
        $review->location = $request->input('location');
        if($review->save()){
            if($request->has('image')){
                $image = $this->imageUpload($request,$status);
                if($status == 2)
                {
                    $prev_img_delete_path = public_path() . '/images/review/photo/' .$review->image;
                    $prev_img_delete_path_thumb = public_path() . '/images/review/photo/thumb/' .$review->image;
                    if (File::exists($prev_img_delete_path)) {
                        File::delete($prev_img_delete_path);
                    }
            
                    if (File::exists($prev_img_delete_path_thumb)) {
                        File::delete($prev_img_delete_path_thumb);
                    }
                }
                $review->image = $image;
                $review->save();
                return 1;
            }
        }
        return 1;
       
    }


    private function imageUpload($request,$status)
    {
        $path = public_path().'/images/review/photo/';
        File::exists($path) or File::makeDirectory($path, 0777, true, true);
        $path_thumb = public_path().'/images/review/photo/thumb/';
        File::exists($path_thumb) or File::makeDirectory($path_thumb, 0777, true, true);
        
        
        $image = $request->file('image');
        $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
        //Usp Original Image
        $destinationPath =public_path().'/images/review/photo';
        $img = Image::make($image->getRealPath());
        $img->save($destinationPath.'/'.$image_name);
        //Usp Image Thumbnail
        $destination = public_path().'/images/review/photo/thumb';
        $img = Image::make($image->getRealPath());
        $img->resize(600, 600, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destination.'/'.$image_name);
       
        return $image_name;
    }

    public function updateReview(AddReviewRequest $request,$review_id)
    {
        $review = Review::findOrFail($review_id);
        $status =2;
        $this->reviewOperation($review,$request,$status);
        return redirect()->route('admin.review.list')->with('message','Review Updated Successfully');
    }

    public function status($review_id,$status)
    {
        $review = Review::findOrFail($review_id);
        $review->status = $status;
        if($review->save()){
            return redirect()->back();
        }
    }


    public function deleteReview($review_id)
    {
        $review = Review::findOrFail($review_id);
        $prev_img_delete_path = public_path() . '/images/review/photo/' .$review->image;
        $prev_img_delete_path_thumb = public_path() . '/images/review/photo/thumb/' .$review->image;
        if (File::exists($prev_img_delete_path)) {
            File::delete($prev_img_delete_path);
        }

        if (File::exists($prev_img_delete_path_thumb)) {
            File::delete($prev_img_delete_path_thumb);
        }
        $review->delete();
        return redirect()->back();
    
    }


    /** Review Add Form
     * @return Review Add  Review View
    */
    public function editReviewForm($review_id)
    {
        $review = Review::findOrFail($review_id);
        return view('admin.review.add_review_form',compact('review'));
    }

    public function view($review_id)
    {
        $review = Review::findOrFail($review_id);
        return view('admin.review.view',compact('review'));
    }


}
