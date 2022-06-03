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
                        <h4 class="mt-0 header-title">Add Distributor</h4>
                        <form action="{{route('admin.distributor.insert')}}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div id="img_div">
                                <div class="row form-group">
                                    <div class="col-sm-6">
                                        <label for="name" class=" col-form-label">Distributor Name</label>
                                        <input type="text" class="form-control m-b-10" name="name" />
                                        
                                        @if($errors->has('name'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="link" class=" col-form-label">Distributor Link</label>
                                        <input type="text" class="form-control m-b-10" name="link" />
                                        
                                        @if($errors->has('link'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('link') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
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


                   

                