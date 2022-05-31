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
                        @if(isset($city) && !empty($city))
                            <h4 class="mt-0 header-title">Edit City</h4>
                            <form action="{{route('admin.city.update',['city_id'=>$city->id])}}" method="post" enctype="multipart/form-data">
                                @method('put')
                        @else
                            <h4 class="mt-0 header-title">Add City</h4>
                            <form action="{{route('admin.city.insert')}}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf
                            <div id="img_div">
                                <div class="row-group">
                                    <div class="col-sm-12">
                                        <label for="city" class=" col-form-label">City Name</label>
                                        <input type="text" class="form-control m-b-10" name="city" value="{{isset($city)?$city->name:old('city')}}"/>
                                        
                                        @if($errors->has('city'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row-group">
                                    <div class="col-sm-12">
                                        @if(isset($city) && !empty($city))
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                                        @else
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
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


                   

                