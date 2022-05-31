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
                        
                        <h4 class="mt-0 header-title">Add Press Releases</h4>
                        <form action="{{route('admin.pressrelease.insert')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div id="img_div">
                              
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="name" >Title</label>
                                        <input type="text" name="name" class="form-control m-b-10" value="{{isset($review)?$review->name:old('name')}}"/>
                                        @if($errors->has('name'))
                                           <div class="alert alert-danger" role="alert">
                                               <strong>{{ $errors->first('name') }}</strong>
                                           </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="image" >Image <small style="color: red">(900*450 px)</small></label>
                                        <input type="file" name="image" class="form-control m-b-10" />
                                        @if($errors->has('image'))
                                           <div class="alert alert-danger" role="alert">
                                               <strong>{{ $errors->first('image') }}</strong>
                                           </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="short_desc" >Short Description</label>
                                        <textarea  name="short_desc" class="form-control m-b-10" >{{isset($review)?$review->short_desc:old('short_desc')}}</textarea>
                                        @if($errors->has('short_desc'))
                                           <div class="alert alert-danger" role="alert">
                                               <strong>{{ $errors->first('short_desc') }}</strong>
                                           </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="long_desc" >Long Description</label>
                                        <textarea  name="long_desc" class="form-control ckeditor" >{{isset($review)?$review->long_desc:old('long_desc')}}</textarea>
                                        @if($errors->has('long_desc'))
                                           <div class="alert alert-danger" role="alert">
                                               <strong>{{ $errors->first('long_desc') }}</strong>
                                           </div>
                                        @enderror
                                    </div>
                                    
                                </div>
                            </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
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
    CKEDITOR.replaceClass="ckeditor";
</script>

    
@endsection


                   

                