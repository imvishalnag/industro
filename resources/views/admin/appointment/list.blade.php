
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
                                    <th>Patient Name</th>
                                    <th>Mobile Number</th>
                                    <th>City</th>
                                    <th>Disease</th>
                                    <th>Comments</th>
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
    ajax: "{{ route('admin.appointment.list_ajax') }}",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex',searchable: false,orderable: false},
        {data: 'name', name: 'appointments.name',searchable: true},
        {data: 'email', name: 'appointments.email' ,searchable: true},  
        {data: 'city', name: 'appointments.cities' ,searchable: true},  
        {data: 'disease', name: 'appointments.sub_categoriess' ,searchable: true},  
        {data: 'comment', name: 'comment' ,searchable: true},  
        {data: 'action', name: 'action' ,searchable: true},  
    ]
});

})
</script>
 @endsection             