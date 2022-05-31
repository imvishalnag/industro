
@extends('admin.template.admin_master')
@section('content')

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Press Releases</h4>
                        <div class="text-right">
                            <a type="button" href="{{route('admin.pressrelease.add_form')}}" class="btn btn-info waves-effect waves-light">Add</a>
                        </div>
                        <table id="press_release" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Title</th>
                                    {{-- <th>Image</th> --}}
                                    {{-- <th>Short Description</th> --}}
                                    {{-- <th>Long Description</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($press_releases as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->title}}</td>
                                        {{-- <td><img src="{{asset('images/press/photo/'.$data->image)}}" style="width:150px;height:150px;"></td> --}}
                                        {{-- <td>{!!$data->short_desc!!}</td> --}}
                                        {{-- <td>{!!$data->long_desc!!}</td> --}}
                                        <td><a href="{{route('admin.pressrelease.delete',['press_id'=>$data->id])}}"  class="btn btn-danger waves-effect waves-light">Delete</a>
                                            <a href="{{route('admin.pressrelease.view',['press_id'=>$data->id])}}"  class="btn btn-success waves-effect waves-light">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
 <!-- end row -->

    </div><!-- container-fluid -->


</div> <!-- Page content Wrapper -->


    
@endsection
@section('script')
 
<script type="text/javascript">
$(document).ready(function(){
    $('#press_release').DataTable({
        processing: true,
        serverSide: false,
    });
});
</script>
 @endsection             