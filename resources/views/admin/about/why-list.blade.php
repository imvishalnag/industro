@extends('admin.template.admin_master')

@section('content')


    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">                
                    @if (Session::has('message'))
                        <div class="alert alert-success" >{{ Session::get('message') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    <div class="card m-b-20">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">About List</h4>
                            <table id="post_list" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Sl. No</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                    <tr>
                                        <td>1</td>
                                        <td>About Page</td>
                                        <td><a href="{{route('admin.about_view')}}" class="btn btn-warning btn-sm">Edit Page</a></td>
                                    </tr>                    
                                    <tr>
                                        <td>2</td>
                                        <td>History Page</td>
                                        <td><a href="{{route('admin.history_view')}}" class="btn btn-warning btn-sm">Edit Page</a></td>
                                    </tr>                    
                                    <tr>
                                        <td>3</td>
                                        <td>Managment Page</td>
                                        <td><a href="{{route('admin.management_view')}}" class="btn btn-warning btn-sm">Edit Page</a></td>
                                    </tr>                    
                                    <tr>
                                        <td>4</td>
                                        <td>Hse Page</td>
                                        <td><a href="{{route('admin.hse_view')}}" class="btn btn-warning btn-sm">Edit Page</a></td>
                                    </tr>                 
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container-fluid -->


    </div> <!-- Page content Wrapper -->

@endsection
 
@section('script')
@endsection