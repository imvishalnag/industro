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

                        <div style="display: flex;justify-content: space-between;margin-bottom: 10px;">
                            <h4 class="mt-0 header-title pull-left">Home Page Product List</h4>
                        </div>
                        <table class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Product</th>
                                    <th>Sub Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($home_product) && !empty($home_product))
                                @foreach($home_product as $items)   
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <img src="{{ asset('backend_images/'.$items->page->image) }}" alt="image" height="100px" class="img-responsive">
                                            &nbsp;{{$items->page->name}}
                                        </td>
                                        <td>{{$items->subcategory->name}}</td>
                                        <td>
                                            @if ($items->status == 1)
                                                <span class="badge badge-success">Enable</span>
                                            @else
                                                <span class="badge badge-danger">Disable</span>
                                            @endif
                                        </td>
                                        <td>                                            
                                            @if ($items->status === 1)
                                                <a href="{{route('admin.home_product_status_update', ['id'=>$items->id , 'status'=> '2'])}}" class="btn btn-danger">Disable Product</a>
                                            @else
                                                <a href="{{route('admin.home_product_status_update', ['id'=>$items->id , 'status'=> '1'])}}" class="btn btn-success">Enable Product</a>
                                            @endif
                                            <a href="{{route('admin.home_product_edit', ['id'=>$items->id])}}" class="btn btn-warning">Change Product</a>                                             
                                        </td>
                                    </tr>
                                @endforeach   
                                    
                                @else
                                <tr>
                                    <td colspan="4" class="text-center"> No slider</td>
                                </tr>                                    
                                @endif
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

    
@endsection


                   

                