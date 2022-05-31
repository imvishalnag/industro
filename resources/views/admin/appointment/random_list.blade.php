
@extends('admin.template.admin_master')
@section('content')

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Appointments</h4>
                       
                        <table id="appointments" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>About Disease</th>
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

var table = $('#appointments').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('admin.random.random_list_ajax') }}",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex',searchable: false,orderable: false},
        {data: 'name', name: 'name' ,searchable: true},  
        {data: 'phone', name: 'phone' ,searchable: true},  
        {data: 'date', name: 'date' ,searchable: true},  
        {data: 'about', name: 'about' ,searchable: true},  
        {data: 'action', name: 'action' ,searchable: true},  
    ]
});

})
</script>
 @endsection             