
@extends('admin.template.admin_master')
@section('content')
<div class="page-content-wrapper ">

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Tutor Details</h4>
                    <p class="text-muted m-b-30 font-14">
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <img style="width:200px;height:200px;" src="{{asset('images/doctor/photo/'.$doctor_details->photo)}}"/>
                            <div class="p-20">
                                <form action="#">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text"  readonly="readonly" value="{{$doctor_details->name}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Degree</label>
                                        <input type="text"readonly="readonly" value="{{$doctor_details->degree}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Experience</label>
                                        <input type="text" readonly="readonly" value="{{$doctor_details->experience}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>About Doctor</label>
                                        {!!$doctor_details->doctor_bio!!}
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                       <!-- end col -->
                    </div> 
                </div>
            </div>
        </div> <!-- end col -->
       
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                <h4 class="mt-0 header-title">Specialities</h4>
                    <div class="row">
                        @foreach($doctor_details->speciality as $items)
                            <div class="col-md-12 form-group">
                                <label> Name</label>
                                <input type="text"  readonly="readonly" value="{{$items->speciality->name}}" class="form-control">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                <h4 class="mt-0 header-title">Consultation</h4>
                @if($doctor_details->has_consultaion_fee == 2)
                    <div class="row">
                       
                            <div class="col-md-6 form-group">
                                <label>Fee</label>
                                <input type="text"  readonly="readonly" value="{{$doctor_details->consultation_fee}}" class="form-control">
                            </div>
                            
                    </div>
                @endif
                </div>
            </div>
        </div>
        
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                <h4 class="mt-0 header-title">Location</h4>
                @if($doctor_details->has_location == 2)
                    <div class="row">
                       
                            <div class="col-md-6 form-group">
                                <label>Fee</label>
                               <textarea class="form-control">{{$doctor_details->location}}</textarea>
                            </div>
                            
                    </div>
                @endif
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card m-b-20">
                <div class="card-body">
                <h4 class="mt-0 header-title">Reviews</h4>
                @if($doctor_details->has_review == 2)
                    <div class="row">
                        @foreach($doctor_details->reviews as $items)
                            <div class="col-md-4 form-group">
                                <label>Name</label>
                                <input type="text"  readonly="readonly" value="{{$items->title}}" class="form-control">
                            </div>
                           
                            <div class="col-md-4 form-group">
                                <label>Description</label>
                                <textarea class="form-control">{{$items->desc}}</textarea>
                            </div>
                            <div class="col-md-4 form-group">
                                <img style="width:60px;height:60px;" src="{{asset('images/doctor/photo/'.$items->image)}}"/>
                            </div>
                        @endforeach
                    </div>
                @endif
                </div>
            </div>
        </div>
        <div>
            <button type="button" onclick="window.close()" class="btn btn-danger">Close</button>
        </div>
        
    </div>
  
     <!-- end row -->

</div><!-- container-fluid -->


</div> <!-- Page content Wrapper -->

</div> <!-- content -->

@endsection
@section('script')


 @endsection             