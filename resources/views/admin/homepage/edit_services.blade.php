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
                        @if(isset($service) && !empty($service))
                            <h4 class="mt-0 header-title">Edit Service</h4>
                            <form action="{{route('admin.service_update',['id'=>$service->id])}}" method="post" enctype="multipart/form-data">
                                @method('put')
                        @else
                            <h4 class="mt-0 header-title">Add Service</h4>
                            <form action="{{route('admin.insert_web_service')}}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf
                            <div id="img_div">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="category" >Category</label>
                                       <select class="form-control"  id="category" name="category">
                                            <option value="">Select Category</option>
                                            @foreach($category as $data)
                                                <option value="{{$data->id}}" {{isset($service) && $service->cat_id == $data->id?'selected':''}} >{{$data->name}}</option>
                                            @endforeach
                                       </select>
                                       
                                       @if($errors->has('category'))
                                           <div class="alert alert-danger" role="alert">
                                               <strong>{{ $errors->first('category') }}</strong>
                                           </div>
                                       @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="city" >Sub Category</label>
                                        <select class="form-control" id="sub_category" name="sub_category">
                                            @foreach($sub_category as $data)
                                                <option value="{{$data->id}}" {{isset($service) && $service->sub_cat_id == $data->id?'selected':''}} >{{$data->name}}</option>
                                            @endforeach
                                            <option value="">Select Sub Category</option>
                                        </select>
                                       
                                       @if($errors->has('sub_category'))
                                           <div class="alert alert-danger" role="alert">
                                               <strong>{{ $errors->first('sub_category') }}</strong>
                                           </div>
                                       @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="sub_category" class="col-form-label">Category Image</label>
                                        <input type="file" class="form-control" name="image" />
                                        
                                        {{-- @if($errors->has('sub_category'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('sub_category') }}</strong>
                                            </div>
                                        @enderror --}}
                                    </div>
                                    <div class="col-sm-6">
                                        @if (isset($service) && $service->image != null)
                                        <img src="{{asset('images/index/service/thumb/'.$service->image)}}" alt="image" style="border-radius:5px;height:180px;margin-top:10px" class="img-responsive">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('admin.webServiceList')}}" class="btn btn-primary waves-effect waves-light m-t-10">Go Back</a>
                            @if(isset($sub_category) && !empty($sub_category))
                                <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">Update</button>
                            @else
                                <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">Submit</button>
                            @endif
                        </form>
                        
                        
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container-fluid -->


</div> <!-- Page content Wrapper -->

    
@endsection
@section('script')
    <script>
        var html = '';
        $('#category').change(function() {
            var cat_id = $(this).val();
            if(cat_id){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"GET",
                    url:"{{ url('admin/pages/find/sub/category')}}"+"/"+cat_id,
                    success:function(data){
                    
                    if ($.isEmptyObject(data)) {
                            $("#sub_category").html("<option value=''>No Sub category Found</option>"); 
                    }else { 
                        html='';
                            $("#sub_category").html("<option value=''>Select Sub Category</option>"); 
                            html+=`<option value=''>Select Sub Category</option>`;
                            $.each( data, function( key, value ) {
                                $("#sub_category").append("<option value='"+value.id+"'>"+value.name+"</option>");
                            
                                html+=`<option value='${value.id}'>${value.name}</option>`;
                            });                      
                    }
                    
                    }
                });
            }else{
                alert('Select Top Category First');
                $("#sub_category").html('');

            }
        });

        $('#sub_category').change(function(){
            var sub_cat_id = $(this).val();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"GET",
                    url:"{{ url('admin/pages/check/sub/category/')}}"+"/"+sub_cat_id,
                    success:function(data){
                        if(data == 2){
                            alert('Sub Category Already Exist');
                        
                            $("#sub_category").html(html); 
                            $("#target").val($("#sub_category option:first").val());
                        }
                    }
                });
        })
    </script>
@endsection


                   

                