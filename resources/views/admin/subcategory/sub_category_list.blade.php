
@extends('admin.template.admin_master')
@section('content')

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                {{-- Response Box --}}
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif 
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif


                <div class="card m-b-20">
                    <div class="card-body">
                        <div style="display: flex;justify-content: space-between;margin-bottom: 10px;align-items: center;">
                            <h4 class="mt-0 header-title pull-left">Sub Category List</h4>
                            <a type="button" href="{{route('admin.subcategory.add_form')}}" class="btn btn-info waves-effect waves-light pull-right mb-0">Add New Sub Category</a>
                        </div>
                        <table id="sub_category_list" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Sub Category Name</th>
                                    <th>Category Name</th>
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

var table = $('#sub_category_list').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('admin.subcategory.list_ajax') }}",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'name', name: 'name',searchable: true},
        {data: 'sub_category', name: 'sub_category',searchable: true},
        {data: 'status', name: 'status' ,searchable: true},  
        {data: 'action', name: 'action' ,searchable: true},  
    ]
});

})
</script>
 @endsection             