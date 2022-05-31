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
                        <h4 class="mt-0 header-title">Edit Chairmen Page</h4>
                        <form action="{{route('admin.chairmen_edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div id="img_div">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12 col-xs-12 mb-3">
                                        <label for="title">Chairmen Header Title<small style="color: red">(900*450 px)</small></label>
                                        <input type="text" class="form-control m-b-10" name="title" value="{{$chairmen->title}}">
                                        @if($errors->has('title'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @enderror
                                        <label for="image">Image Upload <small style="color: red">(900*450 px)</small></label>
                                        <input type="file" class="form-control m-b-10" name="image" accept="/*">
                                        @if($errors->has('image'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                                        <img src="{{ asset('images/index/thumb/'.$chairmen->image) }}" alt="image" height="200px" class="img-responsive">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="surgery_desc" >Description</label>
                                        <style>#cke_1_contents{height: 500px!important;}</style>
                                        <textarea  class="form-control ckeditor" name="description" id="long_desc">{{$chairmen->description}}</textarea>
                                        
                                        @if($errors->has('surgery_desc'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('long_desc') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
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


                   

                