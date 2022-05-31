<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddDoctorRequest;
use App\Http\Requests\Admin\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\DoctorReview;
use App\Models\DoctorSpeciality;
use App\Models\Speciality;
use Illuminate\Http\Request;
use DataTables;
use File;
use Image;
class DoctorController extends Controller
{
    public function viewDetails($doctor_id)
    {
        $doctor_details = Doctor::findOrFail($doctor_id);
        return view('admin.doctor.view',compact('doctor_details'));
    }
    public function index()
    {
        return view('admin.doctor.index');
    }

    public function listAjax()
    {
        $query = Doctor::latest();

        return DataTables::eloquent($query)
            ->addIndexColumn()
        
            ->addColumn('action', function ($row) {
                $btn ='';
                // if($row->status == 1){
                //   $btn .= '<a  href="'.route('admin.category.status',['category_id'=>$row->id,'status'=>2]).'" class="btn btn-danger">Deactivate</a>';
                // }else{
                //   $btn .= '<a  href="'.route('admin.category.status',['category_id'=>$row->id,'status'=>1]).'" class="btn btn-success">Activate</a>';
                // }
                $btn .= '<a  href="'.route('admin.doctor.edit',['doctor_id'=>$row->id]).'" class="btn btn-success">Edit</a>&nbsp';
                $btn .= '<a  target="_blank" href="'.route('admin.doctor.edit_review',['doctor_id'=>$row->id]).'" class="btn btn-warning">Edit Review</a>&nbsp';
                $btn .= '<a  target="_blank" href="'.route('admin.doctor.view_details',['doctor_id'=>$row->id]).'" class="btn btn-primary">View</a>';
                return $btn;
            })->addColumn('image', function ($row) {
                return '<img src="'.asset('images/doctor/photo/'.$row->photo).'" style="height:150px;width:150px;">';
            })
            ->rawColumns(['action','image'])
            ->make(true);
    }

    public function create()
    {
        $specialities = Speciality::where('status',1)->get();
        return view('admin.doctor.create',compact('specialities'));
    }

    public function store(AddDoctorRequest $request)
    {
        $doctor = new Doctor();
        $doctor->name = $request->input('name');
        $doctor->degree = $request->input('degree');
        $doctor->experience = $request->input('experience');
        $doctor->doctor_bio = $request->input('ckone');
        $doctor->cktwo = $request->input('cktwo');
        if($request->input('fee_check') =="Y"){
            $doctor->consultation_fee = $request->input('consultation_fee');
            $doctor->has_consultaion_fee = "2";
            
        }

        if($request->input('address_check')=="Y"){
            $doctor->location = $request->input('location');
            $doctor->has_location = "2";
            
        }

        if($doctor->save()){
            $this->addSpeciality($doctor,$request);
            if($request->hasfile('image')){
                $image = $this->addPhoto($request->file('image'));
                $doctor->photo = $image;
                $doctor->save();
            }
            if($request->input('review_check')=="Y"){
                $this->addDoctorReview($request,$doctor);
                $doctor->has_review=2;
                $doctor->save();
            }
        }
        return redirect()->route('admin.doctor.list')->with('message','Doctor Added Successfully');
    }

    private function addDoctorReview($request,$doctor)
    {
        for($i=0;$i<count($request->input('title'));$i++){
            $review = new DoctorReview();
            $review->title = $request->input('title')[$i];
            $review->desc = $request->input('review_desc')[$i];
            $review->doctor_id = $doctor->id;
            if($review->save()) {
                $path = public_path().'/images/doctor/photo/';
                File::exists($path) or File::makeDirectory($path, 0777, true, true);
                $path_thumb = public_path().'/images/doctor/photo/thumb/';
                File::exists($path_thumb) or File::makeDirectory($path_thumb, 0777, true, true);
                
                
                $image = $request->file('review_image')[$i];
                $image_name = microtime().$i.date('Y-M-d').'.'.$image->getClientOriginalExtension();
                //Usp Original Image
                $destinationPath =public_path().'/images/doctor/photo';
                $img = Image::make($image->getRealPath());
                $img->save($destinationPath.'/'.$image_name);
                //Usp Image Thumbnail
                $destination = public_path().'/images/doctor/photo/thumb';
                $img = Image::make($image->getRealPath());
                $img->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destination.'/'.$image_name);

                $review->image = $image_name;
                $review->save();
            }
        }
        
    }

    private function addSpeciality($doctor,$request)
    {
        for($i=0;$i<count($request->input('speciality_id'));$i++){
            $doctor_speciality =new DoctorSpeciality();
            $doctor_speciality->speciality_id = $request->input('speciality_id')[$i];
            $doctor_speciality->doctor_id = $doctor->id;
            $doctor_speciality->save();

        }
        return 1;
        
    }

    private function addPhoto($images) 
    {
    
        $path = public_path().'/images/doctor/photo/';
        File::exists($path) or File::makeDirectory($path, 0777, true, true);
        $path_thumb = public_path().'/images/doctor/photo/thumb/';
        File::exists($path_thumb) or File::makeDirectory($path_thumb, 0777, true, true);
        
        
        $image = $images;
        $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
        //Usp Original Image
        $destinationPath =public_path().'/images/doctor/photo';
        $img = Image::make($image->getRealPath());
        $img->save($destinationPath.'/'.$image_name);
        //Usp Image Thumbnail
        $destination = public_path().'/images/doctor/photo/thumb';
        $img = Image::make($image->getRealPath());
        $img->resize(600, 600, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destination.'/'.$image_name);
       return $image_name;
    }

    public function edit($doctor_id)
    {
        $doctor = Doctor::findOrFail($doctor_id);
        
        $checked_specialities =array();
        $unchecked_specialities =array();

        $specialities = Speciality::where('status',1)->get();
        $doctor_speciality = DoctorSpeciality::where('doctor_id',$doctor_id)->get();

        foreach($specialities as $data){
            foreach($doctor_speciality as $values ){
                if($values->speciality_id == $data->id){
                    array_push($checked_specialities,$data);
                }
            }

            if(!in_array($data,$checked_specialities)){
                array_push($unchecked_specialities,$data);
            }
            
           

        }
        
        
        return view('admin.doctor.create',compact('doctor','unchecked_specialities','checked_specialities'));
    }

    public function update(UpdateDoctorRequest $request,$doctor_id)
    {
        $doctor = Doctor::findOrFail($doctor_id);
        $doctor->name = $request->input('name');
        $doctor->degree = $request->input('degree');
        $doctor->experience = $request->input('experience');
        $doctor->doctor_bio = $request->input('ckone');
        $doctor->cktwo = $request->input('cktwo');
        if($request->input('fee_check') =="Y"){
            $doctor->consultation_fee = $request->input('consultation_fee');
            $doctor->has_consultaion_fee = "2";
            
        }else{
            $doctor->has_consultaion_fee = "1";  
        }

        if($request->input('address_check')=="Y"){
            $doctor->location = $request->input('location');
            $doctor->has_location = "2";
            
        }else{
            $doctor->has_location = "1";
        }
        $speciality_id = $request->input('speciality_id');
        if($doctor->save()){
            if(isset($speciality_id) && !empty($speciality_id) && count($speciality_id)>0){
            $this->addSpeciality($doctor,$request);
            }
            if($request->hasfile('image')){
                $image = $this->updatePhoto($request->file('image'),$doctor->photo);
                $doctor->photo = $image;
                $doctor->save();
            }
            if($request->input('review_check')=="Y"){
            }
            
        }

        return redirect()->back()->with('message','Doctor Details Updated Successfully');  

    }

    public function removeSpeciality($speciality_id,$doctor_id)
    {
        $doctor_speciality = DoctorSpeciality::where('speciality_id',$speciality_id)->where('doctor_id',$doctor_id)->first();
        if($doctor_speciality && $doctor_speciality->delete()){
            return redirect()->back();
        }

    }

    private function updatePhoto($images, $name) 
    {
    
        $path = public_path().'/images/doctor/photo/';
        File::exists($path) or File::makeDirectory($path, 0777, true, true);
        $path_thumb = public_path().'/images/doctor/photo/thumb/';
        File::exists($path_thumb) or File::makeDirectory($path_thumb, 0777, true, true);
        
        
        $image = $images;
        $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
        //Usp Original Image
        $destinationPath =public_path().'/images/doctor/photo';
        $img = Image::make($image->getRealPath());
        $img->save($destinationPath.'/'.$image_name);
        //Usp Image Thumbnail
        $destination = public_path().'/images/doctor/photo/thumb';
        $img = Image::make($image->getRealPath());
        $img->resize(600, 600, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destination.'/'.$image_name);
        $image_path = "images/doctor/photo/".$name;  
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $image_path_thumb = "images/doctor/photo/thumb/".$name;  
        if(File::exists($image_path_thumb)) {
            File::delete($image_path_thumb);
        }
       return $image_name;
    }

    public function editReview($doctor_id)
    {
        $review = DoctorReview::where('doctor_id',$doctor_id)->get();
        $doctor = Doctor::findOrFail($doctor_id);
        return view('admin.doctor.edit_review',compact('review','doctor_id','doctor'));
    }

    public function removeReview($review_id)
    {
        $review = DoctorReview::findOrFail($review_id);
        $image_path = "images/doctor/photo/".$review->image;  
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $image_path_thumb = "images/doctor/photo/thumb/".$review->image;  
        if(File::exists($image_path_thumb)) {
            File::delete($image_path_thumb);
        }
        $review->delete();
        return redirect()->back();

    }

    public function addReview(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'desc'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'doctor_id'=>'required|numeric'
        ]);
        $review = new DoctorReview();
        $review->title = $request->input('title');
        $review->desc = $request->input('desc');
        $review->doctor_id = $request->input('doctor_id');
        if($review->save()) {
            $image = $request->file('image');
            $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
            //Usp Original Image
            $destinationPath =public_path().'/images/doctor/photo';
            $img = Image::make($image->getRealPath());
            $img->save($destinationPath.'/'.$image_name);
            //Usp Image Thumbnail
            $destination = public_path().'/images/doctor/photo/thumb';
            $img = Image::make($image->getRealPath());
            $img->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destination.'/'.$image_name);

            $review->image = $image_name;
            $review->save();
        }

        return redirect()->back();

    }

    public function updateReview(Request $request)
    {
        $review = DoctorReview::findOrFail($request->input('review_id'));
        $review->title = $request->input('title');
        $review->desc = $request->input('desc');
        if($review->save()){
            if($request->hasfile('image')){
                $image = $request->file('image');
                $image_name = microtime().date('Y-M-d').'.'.$image->getClientOriginalExtension();
                //Usp Original Image
                $destinationPath =public_path().'/images/doctor/photo';
                $img = Image::make($image->getRealPath());
                $img->save($destinationPath.'/'.$image_name);
                //Usp Image Thumbnail
                $destination = public_path().'/images/doctor/photo/thumb';
                $img = Image::make($image->getRealPath());
                $img->resize(600, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destination.'/'.$image_name);
                $image_path = "images/doctor/photo/".$review->image;  
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
                $image_path_thumb = "images/doctor/photo/thumb/".$review->image;  
                if(File::exists($image_path_thumb)) {
                    File::delete($image_path_thumb);
                }
                $review->image = $image_name;
                $review->save();
            }
        }

        return redirect()->back();

    }

    public function reviewStatus($doctor_id)
    {
        $review = Doctor::findOrFail($doctor_id);
        $review->has_review =$review->has_review==1?2:1;
        $review->save();
        return redirect()->back();
    }

}
