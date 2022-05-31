@extends('admin.template.admin_master')
@section('content')

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                        @endif @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        <div style="display: flex;justify-content: space-between;margin-bottom: 10px;">
                            <h4 class="mt-0 header-title pull-left">Home Service List</h4>
                            <a type="button" href="{{route('admin.web_service_add_form')}}" class="btn btn-info waves-effect waves-light">Add Slider</a>
                        </div>
                        <table class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <td>Catagory</td>
                                    <td>Sub Catagory</td>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($service as $items)    
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$items->category->name}}</td>
                                        <td>{{$items->subcategory->name}}</td>
                                        <td> <img src="{{ asset('images/index/service/thumb/'.$items->image) }}" alt="image" height="200px" class="img-responsive"></td>
                                        <td><a href="{{route('admin.service_edit_form', ['id'=>$items->id])}}" class="btn btn-danger">Edit</a></td>
                                    </tr>
                                @endforeach   
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


                   

                