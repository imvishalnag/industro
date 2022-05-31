
@extends('admin.template.admin_master')
@section('content')

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Doctors List</h4>
                        <div class="text-right">
                            <a href="{{route('admin.doctor.create')}}" class="btn btn-info waves-effect waves-light">Add</a>
                        </div>
                        <table id="doctor_list" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                          
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

var table = $('#doctor_list').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('admin.doctor.list_ajax') }}",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex',searchable: false,orderable: false},
        {data: 'name', name: 'name',searchable: true},
        {data: 'image', name: 'image' ,searchable: true},  
        {data: 'action', name: 'action' ,searchable: true},  
    ]
});

})
</script>
 @endsection             