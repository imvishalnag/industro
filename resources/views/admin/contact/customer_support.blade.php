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
                    <h4 class="mt-0 header-title">Edit Customer Support</h4>
                    <form action="{{route('admin.customer_support.add')}}" method="post">
                        @method('put')
                        @csrf
                            <div id="img_div">
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label for="city" class=" col-form-label">Customer Support Phone</label>
                                        <input type="text" class="form-control m-b-10" name="phone" value="{{$customerSupport->phone}}"/>
                                        
                                        @if($errors->has('phone'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="city" class=" col-form-label">Customer Support Email</label>
                                        <input type="email" class="form-control m-b-10" name="email" value="{{$customerSupport->email}}"/>
                                        
                                        @if($errors->has('email'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
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


                   

                