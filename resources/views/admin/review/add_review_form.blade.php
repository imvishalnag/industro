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
                        
                        @if(isset($review) && !empty($review) ) 
                            <h4 class="mt-0 header-title">Edit Review</h4>
                            <form action="{{route('admin.review.update',['review_id'=>$review->id])}}" method="post" enctype="multipart/form-data">
                                @method('put')
                        @else
                            <h4 class="mt-0 header-title">Add Review</h4>
                            <form action="{{route('admin.review.insert')}}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf
                            <div id="img_div">
                              
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="name" >Name</label>
                                        <input type="text" name="name" class="form-control" value="{{isset($review)?$review->name:old('name')}}"/>
                                        @if($errors->has('name'))
                                           <div class="alert alert-danger" role="alert">
                                               <strong>{{ $errors->first('name') }}</strong>
                                           </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="location" >Profession</label>
                                        <input type="text" name="location" class="form-control" value="{{isset($review)?$review->location:old('location')}}"/>
                                        @if($errors->has('location'))
                                           <div class="alert alert-danger" role="alert">
                                               <strong>{{ $errors->first('location') }}</strong>
                                           </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div id="img_div">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="banner_phone" >Description</label>
                                       <textarea class="form-control" name="description" class="form-control" rows="3">{{isset($review)?$review->description:old('description')}}</textarea>
                                       @if($errors->has('description'))
                                           <div class="alert alert-danger" role="alert">
                                               <strong>{{ $errors->first('description') }}</strong>
                                           </div>
                                       @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control m-b-10"  name="image" />
                                        @if(isset($review) && !empty($review) ) 
                                            <img src="{{asset('images/review/photo/'.$review->image)}}" style="width:90px;height:90px;">
                                        @endif
                                       @if($errors->has('image'))
                                           <div class="alert alert-danger" role="alert">
                                               <strong>{{ $errors->first('image') }}</strong>
                                           </div>
                                       @enderror
                                    </div>
                                </div>
                            </div>
                            @if(isset($review) && !empty($review) ) 
                                <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                            @else
                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
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


    
@endsection


                   

                