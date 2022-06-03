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
                        <h4 class="mt-0 header-title">Edit About Page</h4>
                        <form action="{{route('admin.about_edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div id="img_div">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="image_one" >Image Top</label>
                                        <input type="file" name="image_one" class="form-control">
                                        
                                        @if($errors->has('image_one'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('image_one') }}</strong>
                                        </div>
                                        @enderror

                                        @if($about->image_one)
                                        <img src="{{ asset('backend_images/'.$about->image_one.'')}}" style="width: 150px;margin-top: 10px;" />
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="image_two" >Image Bottom</label>
                                        <input type="file" name="image_two" class="form-control">
                                        
                                        @if($errors->has('image_two'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('image_two') }}</strong>
                                        </div>
                                        @enderror

                                        @if($about->image_two)
                                        <img src="{{ asset('backend_images/'.$about->image_two.'')}}" style="width: 150px;margin-top: 10px;" />
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="surgery_desc" >Description</label>
                                        <style>#cke_1_contents{height: 500px!important;}</style>
                                        <textarea  class="form-control ckeditor" name="description" id="long_desc">{{$about->description}}</textarea>
                                        
                                        @if($errors->has('surgery_desc'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('long_desc') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('admin.about.list')}}" class="btn btn-primary waves-effect waves-light m-t-10">Go Back</a>
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


                   

                