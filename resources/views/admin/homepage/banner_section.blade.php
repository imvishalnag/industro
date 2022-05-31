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
                        <h4 class="mt-0 header-title">Edit Banner Page</h4>
                        <form action="{{route('admin.banner_edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div id="img_div">
                                <div class="row">
                                    <div class="col-md-8 col-sm-12 col-xs-12 mb-3">
                                        <label for="image">Image Upload <small style="color: red">(900*450 px)</small></label>
                                        <input type="file" class="form-control m-b-10" name="image" accept="/*">
                                        @if($errors->has('image'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                        @enderror
                                        <label for="surgery_desc" >Description</label>
                                        <textarea  class="form-control ckeditor" name="description" id="long_desc" rows="6">{{$banner->description}}</textarea>
                                        
                                        @if($errors->has('surgery_desc'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('long_desc') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2 col-sm-12 col-xs-12 mb-3">
                                        <img src="{{ asset('images/hero/thumb/'.$banner->image) }}" alt="image" height="250px" class="img-responsive">
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
    
@endsection


                   

                