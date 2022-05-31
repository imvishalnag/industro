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

                            <h4 class="mt-0 header-title">Additional Page List</h4>
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
                                        <td>Why We Are Page</td>
                                        <td>
                                            <a href="{{route('admin.why_view')}}" class="btn btn-warning btn-sm">Edit Page</a>
                                            <a href="{{route('admin.about.why-list')}}" class="btn btn-info btn-sm">All Page</a>
                                        </td>
                                    </tr>                      
                                    <tr>
                                        <td>2</td>
                                        <td>Innovtion Page</td>
                                        <td>
                                            <a href="{{route('admin.innovation_view')}}" class="btn btn-warning btn-sm">Edit Page</a>
                                            <a href="{{route('admin.about.innovation-list')}}" class="btn btn-info btn-sm">All Page</a>
                                        </td>
                                    </tr>                    
                                    <tr>
                                        <td>3</td>
                                        <td>N Media Page</td>
                                        <td>
                                            <a href="{{route('admin.media_view')}}" class="btn btn-warning btn-sm">Edit Page</a>
                                            <a href="{{route('admin.about.media-list')}}" class="btn btn-info btn-sm">All Page</a>
                                        </td>
                                    </tr>                    
                                    <tr>
                                        <td>4</td>
                                        <td>Export Page</td>
                                        <td>
                                            <a href="{{route('admin.export_view')}}" class="btn btn-warning btn-sm">Edit Page</a>
                                            <a href="{{route('admin.about.export-list')}}" class="btn btn-info btn-sm">All Page</a>
                                        </td>
                                    </tr>                    
                                    <tr>
                                        <td>5</td>
                                        <td>Career Page</td>
                                        <td>
                                            <a href="{{route('admin.career_view')}}" class="btn btn-warning btn-sm">Edit Page</a>
                                            <a href="{{route('admin.about.career-list')}}" class="btn btn-info btn-sm">All Page</a>
                                        </td>
                                    </tr>                    
                                    <tr>
                                        <td>6</td>
                                        <td>CSR Page</td>
                                        <td>
                                            <a href="{{route('admin.csr_view')}}" class="btn btn-warning btn-sm">Edit Page</a>
                                            <a href="{{route('admin.about.csr-list')}}" class="btn btn-info btn-sm">All Page</a>
                                        </td>
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