@extends('admin.template.admin_master')

@section('content')
<link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/chartist/css/chartist.min.css')}}">
<div class="page-content-wrapper ">

    <div class="container-fluid">
        <div class="row">
            {{-- <div class="col-md-6 col-lg-6 col-xl-3">
                <a href="{{route('admin.category.list')}}" class="mini-stat clearfix bg-primary">
                    <span class="mini-stat-icon"><i class="dripicons-document"></i></span>
                    <div class="mini-stat-info text-right text-white">
                        <span class="counter">{{$total_catagory}}</span>
                        Total Category
                    </div>
                </a>
            </div> --}}
            <div class="col-md-6 col-lg-6 col-xl-4">
                <a href="{{route('admin.subcategory.list')}}" class="mini-stat clearfix bg-primary">
                    <span class="mini-stat-icon"><i class="dripicons-document"></i></span>
                    <div class="mini-stat-info text-right text-white">
                        <span class="counter">{{$total_pages}}</span>
                        Total Sub Category
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <a href="{{route('admin.pages.list')}}" class="mini-stat clearfix bg-primary">
                    <span class="mini-stat-icon"><i class="mdi mdi-blogger"></i></span>
                    <div class="mini-stat-info text-right text-white">
                        <span class="counter">{{$total_product}}</span>
                        Total Product
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4">
                <a href="{{route('admin.contact.list')}}" class="mini-stat clearfix bg-primary">
                    <span class="mini-stat-icon"><i class="fa fa-handshake-o"></i></span>
                    <div class="mini-stat-info text-right text-white">
                        <span class="counter">{{$total_contact}}</span>
                        Total Enqury
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                        <h4 class="mt-0 m-b-15 header-title">Recent Contact</h4>
                        <div class="table-responsive">
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
                                    @foreach($contact as $items)    
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
                </div>

                
            </div> 

        </div>
    </div><!-- container-fluid -->


</div> <!-- Page content Wrapper -->
@endsection	
@section('script')

@endsection
