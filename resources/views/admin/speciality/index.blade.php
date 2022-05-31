
@extends('admin.template.admin_master')
@section('content')

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Speciality List</h4>
                        <div class="text-right">
                            <a href="{{route('admin.speciality.create')}}" class="btn btn-info waves-effect waves-light">Add</a>
                        </div>
                        <table id="specialities" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach($specialities as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ucwords($data->name)}}</td>
                                <td>
                                    @if($data->status==1)
                                        <span class="badge badge-pill badge-success">Enabled</span>
                                    @else
                                        <span class="badge badge-pill badge-primary">Disabled</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->status==1)
                                       <a href="{{route('admin.speciality.status',['speciality_id'=>$data->id])}}"  class="btn btn-danger waves-effect waves-light">Disable</a>
                                    @else
                                        <a href="{{route('admin.speciality.status',['speciality_id'=>$data->id])}}" class="btn btn-success waves-effect waves-light">Enable</a>
                                    @endif

                                    <a href="{{route('admin.speciality.edit',['speciality_id'=>$data->id])}}"  class="btn btn-info waves-effect waves-light">Edit</a>

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
  $(function () {
            var table = $('#specialities').DataTable({});
    });
 
</script>
 @endsection             