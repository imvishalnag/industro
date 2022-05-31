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
                        @if(isset($category) && !empty($category))
                            <h4 class="mt-0 header-title">Edit Category</h4>
                            <form action="{{route('admin.category.update',['category_id'=>$category->id])}}" method="post" enctype="multipart/form-data">
                                @method('put')
                        @else
                            <h4 class="mt-0 header-title">Add Category</h4>
                            <form action="{{route('admin.category.insert')}}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf
                            <div id="img_div">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="category" class="col-form-label">Category Name</label>
                                        <input type="text" class="form-control m-b-10" name="category" value="{{isset($category)?$category->name:old('category')}}"/>
                                        
                                        @if($errors->has('category'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('category') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <a href="{{route('admin.category.list')}}" class="btn btn-danger waves-effect waves-light m-t-10">Go Back</a>
                            @if(isset($category) && !empty($category))
                                <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">Update</button>
                            @else
                                <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">Submit</button>
                            @endif
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
     
    CKEDITOR.replace( 'surgery_desc', {
        height: 400,
        filebrowserUploadUrl: "{{route('admin.ck_editor_image_upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    } );

    $(document).ready(function(){

    });
</script>  
@endsection


                   

                