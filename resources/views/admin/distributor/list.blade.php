
@extends('admin.template.admin_master')
@section('content')

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <div class="card m-b-20">
                    <div class="card-body">

                        <div style="display: flex;justify-content: space-between;margin-bottom: 10px;align-items: center;">
                            <h4 class="mt-0 header-title pull-left">Distributor List</h4>
                            <a href="{{route('admin.distributor.add_form')}}" class="btn btn-info waves-effect waves-light">Add</a>
                        </div>
                        <table class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($distributor) && $distributor->count() > 0 )
                                    
                                    @foreach ($distributor as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->link}}</td>
                                            <td><a  href="{{route('admin.distributor.delete',['distributor_id'=>$item->id])}}" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                    @endforeach                                   
                                @else
                                <tr>
                                    <td colspan="4" style="text-align:center">No distributor Added</td>
                                </tr> 
                                @endif
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

var table = $('#city_list').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('admin.city.list_ajax') }}",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'name', name: 'name',searchable: true},
        {data: 'status', name: 'status' ,searchable: true},  
        {data: 'action', name: 'action' ,searchable: true},  
    ]
});

})
</script>
 @endsection             