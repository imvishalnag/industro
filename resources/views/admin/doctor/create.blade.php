@extends('admin.template.admin_master')
@section('content')

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <div class="card m-b-20">
                    @if(isset($doctor) && !empty($doctor))
                        <form method="post" action="{{route('admin.doctor.update',['doctor_id'=>$doctor->id])}}" enctype="multipart/form-data">
                            @method('PUT')
                    @else
                        <form method="post" action="{{route('admin.doctor.insert')}}" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Add Doctor</h4>
                            <div class="row form-group">
                                <div class="col-sm-6 col-6">
                                    <label class="col-form-label">Name</label>
                                    @if(isset($doctor) && !empty($doctor))
                                    <input type="hidden" id="doctor_id" value="{{$doctor->id}}">
                                    @endif
                                    <input type="text" name="name" class="form-control" value="{{isset($doctor->name)?$doctor->name:old('name')}}">
                                    @if($errors->has('name'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 col-6">
                                    <label class="col-form-label">Experience</label>
                                    <input type="number" name="experience" class="form-control" value="{{isset($doctor->experience)?$doctor->experience:old('experience')}}">
                                    @if($errors->has('experience'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('experience') }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 col-6">
                                    <label class="col-form-label">Degree</label>
                                    <input type="text" name="degree" class="form-control" value="{{isset($doctor->degree)?$doctor->degree:old('degree')}}">
                                    @if($errors->has('degree'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('degree') }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 col-6">
                                    <label class="col-form-label">Profile Image <small style="color: red">(185*185 px)</small></label>
                                    <input type="file" name="image" class="form-control" >
                                    @if(isset($doctor->photo) && !empty($doctor->photo))
                                        <img src="{{asset('images/doctor/photo/'.$doctor->photo)}}" style="width:150px;height:150px;">
                                    @endif
                                        @if($errors->has('image'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-12 col-12">
                                    <label class="col-form-label">Select Speciality</label><br>
                                    @if(isset($doctor) && !empty($doctor))
                                        @foreach($unchecked_specialities as $data)
                                            
                                                <input type="checkbox"   name="speciality_id[]" value="{{$data->id}}" >
                                                <label for="vehicle1"> {{$data->name}}</label>
                                        
                                        @endforeach
                                        @foreach($checked_specialities as $data)
                                            
                                                <input type="checkbox"  class="check_id" value="{{$data->id}}" checked>
                                                <label for="vehicle1"> {{$data->name}}</label>
                                        
                                        @endforeach
                                    @else
                                    @foreach($specialities as $data)
                                        <input type="checkbox"  name="speciality_id[]" value="{{$data->id}}" >
                                        <label for="vehicle1"> {{$data->name}}</label>
                                    @endforeach
                                    @endif
                                    @if($errors->has('speciality_id'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('speciality_id') }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12">
                                    <label class="col-form-label">About Doctor</label><br>
                                    <textarea class="form-control ckeditor" name="ckone">{{isset($doctor->doctor_bio)?$doctor->doctor_bio:old('ckone')}}</textarea>
                                    @if($errors->has('ckone'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('ckone') }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <input type="checkbox"  name="fee_check" value="Y" id="consult_check" {{isset($doctor->has_consultaion_fee) && $doctor->has_consultaion_fee =='2'?'checked':''}}>
                                    <label for="vehicle1">Do You want to add Consultation Fee?</label>
                                    <div class="form-group col-12" style="display:{{isset($doctor->has_consultaion_fee) && $doctor->has_consultaion_fee =='2'?'flex':'none'}};" id="consult_div">
                                        <label class="col-form-label">Fee</label>
                                        <input type="number" name="consultation_fee" class="form-control" value="{{isset($doctor->consultation_fee)?$doctor->consultation_fee:old('consultation_fee')}}">
                                        @if($errors->has('consultation_fee'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('consultation_fee') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            
                                <div class="col-md-6" style="border-left: 1px solid #aaa;">
                                    <input type="checkbox" value="Y" name="address_check" id="address_check"  {{isset($doctor->has_location) && $doctor->has_location =='2'?'checked':''}}>
                                    <label for="vehicle1">Do You want to add Address?</label>
                                    <div class="form-group col-12" style="display:{{isset($doctor->has_location) && $doctor->has_location =='2'?'flex':'none'}};" id="address_div">
                                        <label class="col-form-label">Location</label>
                                        <textarea class="form-control" name="location">{{isset($doctor->location) ?$doctor->location:old('location')}}</textarea>
                                        @if($errors->has('location'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('location') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            

                            @if(!isset($doctor) && empty($doctor))
                                <hr>
                                <input type="checkbox" value="Y" name="review_check" id="review_check"  >
                                <label for="vehicle1">Do You want to add Reviews?</label>
                                <div  style="display:none;" id="review_div">
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label class="col-form-label">Name</label>
                                            <input class="form-control" type="text" name="title[]">
                                            @if($errors->has('title'))
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </div>
                                            @enderror

                                            <label class="col-form-label">Image<span style="color:red">(60x60)</span></label>
                                            <input class="form-control" type="file" name="review_image[]">
                                            @if($errors->has('review_image'))
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>{{ $errors->first('review_image') }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-6" >
                                            <label class="col-form-label">Description</label>
                                            <button type="button" class="btn btn-info waves-effect waves-light pull-right" onclick="AddReview()">Add More Reviews</button>
                                            <textarea class="form-control" name="review_desc[]" rows="4"></textarea>
                                            @if($errors->has('review_desc'))
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>{{ $errors->first('review_desc') }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <hr>
                            <div class="row col-12 justify-content-center">
                                @if(isset($doctor) && !empty($doctor))
                                    <button class="btn btn-success waves-effect waves-light" type="submit">Update Doctor Profile</button>
                                @else
                                    <button class="btn btn-success waves-effect waves-light" type="submit">Save Doctor Profile</button>
                                @endif    
                            </div>

                        </div>
                    </form>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container-fluid -->


</div> <!-- Page content Wrapper -->

</div> <!-- content -->

@endsection
@section('script')
<script src="{{ asset('admin/ckeditor4/ckeditor.js')}}"></script>
<script>
$(document).ready(function() {
    CKEDITOR.replaceClass="ckeditor";
});

$('#consult_check').click(function(){
    if ($(this).is(':checked')) {
        $('#consult_div').show();
    }else{
        $('#consult_div').hide();
    }
})

$('#address_check').click(function(){
    if ($(this).is(':checked')) {
        $('#address_div').show();
    }else{
        $('#address_div').hide();
    }
})
$('#review_check').click(function(){
    if ($(this).is(':checked')) {
        $('#review_div').show();
    }else{
        $('#review_div').hide();
    }
})

$('.check_id').click(function(){
    if ($(this).is(':checked')) {
    }else{
        alert('Are u Sure?');
        var speciality_id = $(this).val();
        var doctor_id = $('#doctor_id').val();
        var url = "{{url('admin/doctor/remove/speciality')}}"+"/"+speciality_id+"/"+doctor_id;
        window.location.href = url;
        
    }
})
var review_count=0;
function AddReview(){
   var html=(`<div id="morediv${review_count}" class="mt-5"><div class="form-group row"><div class="col-6">
                <label class="col-form-label">Name</label>
                <input class="form-control" type="text" name="title[]" required>                    
                <label class="col-form-label">Image</label>
                <input class="form-control" type="file" name="review_image[]" required>
            </div>
            <div class="col-6" >
                <label class="col-form-label">Description</label>
                <button type="button" onclick="removeReview(${review_count})"class="btn btn-danger waves-effect waves-light pull-right" onclick="AddReview()">Remove Review</button>
                <textarea class="form-control" name="review_desc[]" rows="4" required></textarea>
            </div></div></div>`);

        $('#review_div').append(html);
        review_count++;
}

function removeReview(div){
    $('#morediv'+div).remove();
    review_count--;
}
</script>
@endsection