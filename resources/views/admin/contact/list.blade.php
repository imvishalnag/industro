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

                        <h4 class="mt-0 header-title">Contact List</h4>
                        <table id="contacts" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <th>Sl. No</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Email/Mobile</th>
                                <th>Message</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $items)    
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$items->name}}</td>
                                        <td>{{$items->subject}}</td>
                                        <td>{{$items->email}}</td>
                                        <td>{{$items->message}}</td>
                                        <td><a href="{{route('admin.contact.delete',['contact_id'=>$items->id])}}" class="btn btn-danger">Delete</a></td>
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
<script>
$(document).ready(function(){
    $('#contacts').DataTable({
        processing: true,
        serverSide: false,
    });
});
</script>
@endsection