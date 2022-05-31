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
                        @if(isset($speciality) && !empty($speciality))
                            <form action="{{route('admin.speciality.update',['speciality_id'=>$speciality->id])}}" method="post" enctype="multipart/form-data">
                                @method('put')
                        @else
                            <form action="{{route('admin.speciality.insert')}}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf
                            <div id="img_div">
                                <div class="row-group">
                                    <label for="speciality" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                       <input type="text" class="form-control" name="speciality" value="{{isset($speciality)?$speciality->name:old('speciality')}}"/>
                                       
                                       @if($errors->has('speciality'))
                                           <div class="alert alert-danger" role="alert">
                                               <strong>{{ $errors->first('speciality') }}</strong>
                                           </div>
                                       @enderror
                                    </div>
                                </div>
                            </div>
                            @if(isset($speciality) && !empty($speciality))
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


                   

                