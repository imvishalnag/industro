
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
                        <h4 class="mt-0 header-title">Reviews</h4>
                        <div style="text-align: right">
                            <a href="{{route('admin.review.add_form')}}" class="btn btn-primary">Add More</a>
                        </div>
                        <table id="reviews" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Profession</th>
                                    <th>Status</th>
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

var table = $('#reviews').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('admin.review.list_ajax') }}",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'name', name: 'name',searchable: true},
        {data: 'location', name: 'location' ,searchable: true},    
        {data: 'status', name: 'status' ,searchable: true},  
        {data: 'action', name: 'action' ,searchable: true},  
    ]
});

})
</script>
 @endsection             