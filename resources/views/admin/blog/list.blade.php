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

                            <h4 class="mt-0 header-title">Blog List</h4>
                            <table id="post_list" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                    <th>Sl. No</th>
                                    <th>Title</th>
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

        </div><!-- container-fluid -->


    </div> <!-- Page content Wrapper -->

@endsection
 
@section('script')
<script>
    $(function(){
        var table = $('#post_list').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.ajax.show_post') }}",
            columns: [
                {data: 'id', name: 'id',searchable: true},
                {data: 'title', name: 'title',searchable: true},      
                {data: 'status', name: 'status',searchable: true},         
                {data: 'action', name: 'action',searchable: true},      
            ]
        });
    })
</script>
@endsection