@extends('admin.template.admin_master')
@section('content')

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">                        
                <form action="{{route('admin.update_page',['page_id'=>$page_details->id])}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card m-b-20">
                        <div class="card-body">                            
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif @if (Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif

                            <div style="display: flex;justify-content: space-between;margin-bottom: 10px;align-items: center;">
                                <h4 class="mt-0 header-title pull-left">Edit Product</h4>
                                <a href="{{route('admin.image.list',['page_id'=>$page_details->id])}}" class="btn btn-xs btn-info">Edit Product Image</a>
                            </div>
                        
                            <div id="img_div">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="category" >Category</label>
                                        <input type="hidden" id="page_ids" value="{{$page_details->id}}">
                                        <select class="form-control"  id="category" name="category">
                                            <option value="">Select Category</option>
                                            @foreach($category as $data)
                                                <option value="{{$data->id}}" {{isset($page_details) && $page_details->cat_id == $data->id?'selected':''}}>{{$data->name}}</option>
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
                                            
                                            <option value="">Select Sub Category</option>
                                            @foreach($sub_category as $data)
                                                <option value="{{$data->id}}" {{$data->id == $page_details->sub_cat_id?'selected':''}}>{{$data->name}}</option>
                                            @endforeach
                                        </select>
                                        
                                        @if($errors->has('sub_category'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('sub_category') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="name" >Name</label>                                        
                                        <input type="text" class="form-control m-b-10" name="name" value="{{isset($page_details)?$page_details->name:old('name')}}"/>
                                        
                                        @if($errors->has('name'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="short_description" >Short Description</label>
                                        <textarea class="form-control" name="short_description" rows="5">{{$page_details->short_description}}</textarea>
                                        
                                        @if($errors->has('short_description'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('short_description') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="description" >Description</label>
                                        <style>#cke_1_contents{height: 300px!important;}</style>
                                        <textarea  class="form-control ckeditor" name="description" id="long_desc">{{$page_details->description}}</textarea>
                                        
                                        @if($errors->has('long_desc'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('long_desc') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <a href="{{route('admin.pages.list')}}" class="btn btn-xs btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                        </div>
                    </div>

                </form>
                        
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div><!-- container-fluid -->


</div> <!-- Page content Wrapper -->

    
@endsection

@section('script')
    <script src="{{ asset('admin/ckeditor4/ckeditor.js')}}"></script>
    <script>   
        CKEDITOR.replaceClass="ckeditor";
        
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
                    } else { 
                            $("#sub_category").html("<option value=''>Select Sub Category</option>"); 
                            $.each( data, function( key, value ) {
                                $("#sub_category").append("<option value='"+value.id+"'>"+value.name+"</option>");
                            });                         
                    }
                    
                    }
                });
            }else{
                alert('Select Top Category First');
                $("#sub_category").html('');

            }
        });
    </script>    
@endsection


                   

                