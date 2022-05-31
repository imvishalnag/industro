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

                        {{ Form::open(['method' => 'post','route'=>'admin.change_password'])}}      
                            <div class="form-group">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Current Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" name="current_password" id="example-text-input">
                                </div>
                                @if($errors->has('current_password'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('current_password') }}</strong>
                                </div>
                                @enderror
                            </div>
                            <label for="example-search-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="new_password" type="password">
                                    @if($errors->has('new_password'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('new_password') }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <label for="example-search-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="confirm_password" type="password">
                                    @if($errors->has('confirm_password'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('confirm_password') }}</strong>
                                        </div>
                                    @enderror
                                </div>
                        
                            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                        {{ Form::close() }}
                    </div>
                        
                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container-fluid -->


</div> <!-- Page content Wrapper -->

    
@endsection
                   

                