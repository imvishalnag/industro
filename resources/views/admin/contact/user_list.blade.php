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
                        <table id="users" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <th>Sl. No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $items)    
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$items->name}}</td>
                                        <td>{{$items->email}}</td>
                                        <td>{{$items->phone}}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#exampleModalCenter{{$loop->iteration}}" class="btn btn-primary text-white">Detail</button>
                                            <a href="{{route('admin.user.delete',['user_id'=>$items->id])}}" class="btn btn-danger">Delete</a>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">{{$items->name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if ($items->social_media !== null)
                                                            <div>
                                                                <label style="font-weight: 700;">Social Media Link :</label>
                                                                <p>{{$items->social_media}}</p>
                                                            </div>
                                                            @endif
                                                            @if ($items->product !== null)
                                                            <div>
                                                                <label style="font-weight: 700;">Product Line or Idea :</label>
                                                                <p>{{$items->product}}</p>
                                                            </div>
                                                            @endif
                                                            @if ($items->subject !== null)
                                                            <div>
                                                                <label style="font-weight: 700;">Subject :</label>
                                                                <p>{{$items->subject}}</p>
                                                            </div>
                                                            @endif
                                                            @if ($items->message !== null)
                                                            <div>
                                                                <label style="font-weight: 700;">Message :</label>
                                                                <p>{{$items->message}}</p>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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
    $('#users').DataTable({
        processing: true,
        serverSide: false,
    });
});
</script>
{{-- <script type="text/javascript">
    $("#submit").click(function () {
        var name = $("#name").val();
        var marks = $("#marks").val();
        var str = "You Have Entered " 
            + "Name: " + name 
            + " and Marks: " + marks;
        $("#modal_body").html(str);
    });
</script> --}}
@endsection