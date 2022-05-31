@extends('admin.template.admin_master')

@section('content')

<div class="page-content-wrapper">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div>
                    @if (Session::has('message'))
                        <div class="alert alert-success" >{{ Session::get('message') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                </div>
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Edit Blog</h4>
                        {{ Form::open(['method' => 'post','route'=>'admin.update_post', 'enctype'=>'multipart/form-data']) }}
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <div class="row mb-10">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control m-b-10" name="title" placeholder="Enter Title" value="{{ $post->title }}">
                                    @if($errors->has('title'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @enderror
                                    
                                    <label for="category">Short Description*</label>
                                    <textarea class="form-control" name="body" placeholder="Enter full description" rows="4">{{ $post->body }}</textarea>
                                    @if($errors->has('body'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-3">
                                    <label for="image">Image Upload <small style="color: red">(900*450 px)</small></label>
                                    <input type="file" class="form-control m-b-10" name="image" accept="/*">
                                    @if($errors->has('image'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @enderror
                                    <div>
                                        <img src="{{ asset('images/post/thumb/'.$post->image) }}" alt="image" height="200px" width="450px">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                </div>                                 
                            </div>
                            <div class="row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="category">Long Description*</label>
                                    <textarea class="form-control" name="long_desc" placeholder="Enter full description" id="long_desc">{{ $post->long_desc }}</textarea>
                                    @if($errors->has('long_desc'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('long_desc') }}</strong>
                                    </span>
                                    @enderror
                                </div>                                 
                            </div>

                            <div class="form-group">    	            	
                                {{ Form::submit('Update', array('class'=>'btn btn-success pull-right')) }}  
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
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

