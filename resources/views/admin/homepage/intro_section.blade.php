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
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Edit Intro Page</h4>
                        <form action="{{route('admin.intro_edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div id="img_div">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="surgery_desc" >Description</label>
                                        <style>#cke_1_contents{height: 300px!important;}</style>
                                        <textarea  class="form-control ckeditor" name="description" id="long_desc">{{$about->description}}</textarea>
                                        
                                        @if($errors->has('surgery_desc'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('long_desc') }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- Service 1 --}}
                                    <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                        <hr>
                                        <h4 class="mt-0 header-title">Service 1</h4>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="image">Title</label>
                                        <input type="text" class="form-control m-b-10" name="service_one" value="{{$about->service_one}}">
                                        @if($errors->has('service_one'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('service_one') }}</strong>
                                        </span>
                                        @enderror
                                    </div> 
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="image">Write up</small></label>
                                        <textarea class="form-control" rows="6" name="service_one_description">{{$about->service_one_description}}</textarea>
                                        @if($errors->has('service_one_description'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('service_one_description') }}</strong>
                                        </span>
                                        @enderror
                                    </div> 
                                    
                                    {{-- Service 2 --}}
                                    <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                        <hr>
                                        <h4 class="mt-0 header-title">Service 2</h4>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="image">Title</label>
                                        <input type="text" class="form-control m-b-10" name="service_two" value="{{$about->service_two}}">
                                        @if($errors->has('service_two'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('service_two') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="image">Write up</small></label>
                                        <textarea class="form-control" rows="6" name="service_two_description">{{$about->service_two_description}}</textarea>
                                        @if($errors->has('service_two_description'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('service_two_description') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    
                                    {{-- Service 3 --}}
                                    <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                        <hr>
                                        <h4 class="mt-0 header-title">Service 3</h4>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="image">Title</label>
                                        <input type="text" class="form-control m-b-10" name="service_three"  value="{{$about->service_three}}">
                                        @if($errors->has('service_three'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('service_three') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="image">Write up</small></label>
                                        <textarea class="form-control" rows="6" name="service_three_description">{{$about->service_three_description}}</textarea>
                                        @if($errors->has('service_three_description'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('service_three_description') }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    {{-- Service 4 --}}
                                    <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                        <hr>
                                        <h4 class="mt-0 header-title">Service 4</h4>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="image">Title</label>
                                        <input type="text" class="form-control m-b-10" name="service_four"  value="{{$about->service_four}}">
                                        @if($errors->has('service_four'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('service_four') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                        <label for="image">Write up</small></label>
                                        <textarea class="form-control" rows="6" name="service_four_description">{{$about->service_four_description}}</textarea>
                                        @if($errors->has('service_four_description'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('service_four_description') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <hr />
                            </div>
                            <a href="{{route('admin.deshboard')}}" class="btn btn-primary waves-effect waves-light m-t-10">Go Back</a>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">Submit</button>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container-fluid -->


</div> <!-- Page content Wrapper -->

    
@endsection
@section('script')

<script src="{{ asset('admin/ckeditor4/ckeditor.js')}}"></script>
<script>
    
    CKEDITOR.replace( 'long_desc', {
        height: 400,
        filebrowserUploadUrl: "{{route('admin.ck_editor_image_upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    } );

    $(document).ready(function(){

    });
</script>
    
@endsection


                   

                