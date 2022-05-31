<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Models\Blog;
use DB;
use File;
class BlogsController extends Controller
{
    public function index(){
        return view('admin.blog.index');
    }
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $title = $request->input('title');
        $body = $request->input('body');
        $long_desc = $request->input('long_desc');
        $slug = Str::slug($title);

        if($request->hasfile('image'))
        {
            $image = $request->file('image');
            $destination = base_path().'/public/images/post/';
            $image_extension = $image->getClientOriginalExtension();
            $image_name = md5(date('now').time()).".".$image_extension;
            $original_path = $destination.$image_name;
            Image::make($image)->save($original_path);
            $thumb_path = base_path().'/public/images/post/thumb/'.$image_name;
            Image::make($image)
            ->resize(346, 252)
            ->save($thumb_path);
        }

        $blog = new Blog;
        $blog->title = $title;
        $blog->body = $body;
        $blog->long_desc = $long_desc;
        $blog->slug = $slug;
        $blog->image = $image_name;

        if($blog->save()){
            return redirect()->route('admin.blog_list')->with('message', 'Blog Added Successfully');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function ckEditorImageUpload(Request $request){
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
       
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
       
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
       
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
       
            //Upload File
            // $request->file('upload')->storeAs('assets/category/ckeditor/', $filenametostore);

            $request->file('upload')->move(public_path('admin/assets/ckeditor'), $filenametostore);
     
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('admin/assets/ckeditor/'.$filenametostore); 
            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
              
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }
    }

    public function list(){
        return view('admin.blog.list');
    }

    public function show(){
        $query = Blog::latest();
        return datatables()->of($query->get())
        ->addIndexColumn()
        ->addColumn('status',function($row){
            if ($row->status == '1') {
                $btn = '<span class="badge badge-success">Published</span>';
                return $btn;
            }else{
                $btn = '<span class="badge badge-warning">Unpublished</span>';
                return $btn;
            }
        })
        ->addColumn('action', function($row){
            $btn = '
            <a href="'.route('admin.post_view', [encrypt($row->id)]).'" class="btn btn-info btn-sm" target="_blank">View</a>
            <a href="'.route('admin.post_edit', [encrypt($row->id)]).'" class="btn btn-warning btn-sm">Edit</a>              
            <a href="'.route('admin.post_delete', [encrypt($row->id)]).'" class="btn btn-danger btn-sm">Delete</a>              
            ';
            if ($row->status == '1') {
                $btn .= '<a href="'.route('admin.post_status', ['id' => encrypt($row->id), 'status' => encrypt(2)]).'" class="btn btn-primary btn-sm">Unpublish</a>';
                return $btn;
            }else{
                $btn .= '<a href="'.route('admin.post_status', ['id' => encrypt($row->id), 'status' => encrypt(1)]).'" class="btn btn-success btn-sm">Publish</a>';
                return $btn;
            }
            return $btn;
        })
        ->rawColumns(['action','status'])
        ->make(true);
    }

    public function singlePost($id){
        try {
            $id = decrypt($id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }
        $single_post = Blog::find($id);
        return view('admin.blog.show', compact('single_post'));
    }

    public function editPost($id){
        try {
            $id = decrypt($id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }
        $post = Blog::find($id);
        return view('admin.blog.edit', compact('post'));
    }

    public function updatePost(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'long_desc' => 'required',
        ]);
        $id = $request->input('id');
        $title = $request->input('title');
        $body = $request->input('body');
        $long_desc = $request->input('long_desc');
        $slug = Str::slug($title);

        if($request->hasfile('image'))
        {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image = $request->file('image');
            $destination = base_path().'/public/images/post/';
            $image_extension = $image->getClientOriginalExtension();
            $image_name = md5(date('now').time()).".".$image_extension;
            $original_path = $destination.$image_name;
            Image::make($image)->save($original_path);
            $thumb_path = base_path().'/public/images/post/thumb/'.$image_name;
            Image::make($image)
            ->resize(300, 400)
            ->save($thumb_path);

            // Check wheather image is in DB
            $checkImage = Blog::find($id);
            if($checkImage->image){
                //Delete
                $image_path = "admin/posts/thumb/".$checkImage->image;  
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }

                //Update
                $image_update = DB::table('blogs')
                ->where('id', $id)
                ->update([
                    'image' => $image_name,
                    'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString()
                ]);   

                if($image_update){
                    return redirect()->back()->with('message','Post Updated Successfully!');
                }else{
                    return redirect()->back()->with('error','Something Went Wrong Please Try Again');
                } 
            }else{
                //Update
                $image_update = DB::table('blogs')
                ->where('id', $id)
                ->update([
                    'image' => $image_name,
                    'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString()
                ]);   
                
                if($image_update){
                    return redirect()->back()->with('message','Post Updated Successfully!');
                }else{
                    return redirect()->back()->with('error','Something Went Wrong Please Try Again');
                } 
            }
        }

        $blog = Blog::find($id);
        $blog->title = $title;
        $blog->body = $body;
        $blog->long_desc = $long_desc;
        $blog->slug = $slug;
        if($blog->save()){
            return redirect()->back()->with('message', 'Blog Updated Successfully!');
        }else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function deletePost($id){
        try {
            $id = decrypt($id);
        }catch(DecryptException $e) {
            return redirect()->back();
        }
        $post = Blog::find($id);
        if($post->delete()){
            if(File::exists(public_path().' images/post/'.$post->image)){
                File::delete(public_path().' images/post/'.$post->image);
            }

            if(File::exists(public_path().' images/post/thumb/'.$post->image)){
                File::delete(public_path().' images/post/thumb/'.$post->image);
            }
                return redirect()->back()->with('message', 'Blog Deleted Successfully');
            }else {
                return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function statusPost($id, $statusId){
        try {
            $id = decrypt($id);
            $sId = decrypt($statusId);
        }catch(DecryptException $e) {
            return redirect()->back();
        }
        $post_update = DB::table('blogs')
            ->where('id', $id)
            ->update([
                'status' => $sId,
                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString()
            ]);

            if($post_update){
                return redirect()->back()->with('message','Post Updated Successfully');
            }else{
                 return redirect()->back()->with('error','Something Went Wrong Please Try Again');
            } 
    
    }
}
