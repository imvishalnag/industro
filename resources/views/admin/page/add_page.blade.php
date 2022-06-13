@extends('admin.template.admin_master')
@section('content')

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                        
                <form action="{{route('admin.insert_page')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card m-b-20">
                        <div class="card-body">
                            <div style="display: flex;justify-content: space-between;margin-bottom: 10px;align-items: center;">
                                <h4 class="mt-0 header-title pull-left">Add Product</h4>
                            </div>

                            {{-- Message Area --}}
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif @if (Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif

                            <div id="img_div">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="category" >Category</label>
                                       <select class="form-control" id="category" name="category">
                                            <option value="">Select Category</option>
                                            @foreach($category as $data)
                                                <option value="{{$data->id}}" >{{$data->name}}</option>
                                            @endforeach
                                       </select>
                                       
                                       @if($errors->has('category'))
                                           <div class="alert alert-danger mt-1" role="alert">
                                               <strong>{{ $errors->first('category') }}</strong>
                                           </div>
                                       @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="city" >Sub Category</label>
                                        <select class="form-control" id="sub_category" name="sub_category">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                       
                                       @if($errors->has('sub_category'))
                                           <div class="alert alert-danger mt-1" role="alert">
                                               <strong>{{ $errors->first('sub_category') }}</strong>
                                           </div>
                                       @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-7">
                                        <label for="name" >Name</label>
                                        <input type="text" name="name" class="form-control" id="name" />
                                        
                                        @if($errors->has('name'))
                                            <div class="alert alert-danger mt-1" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-5">
                                        <label for="surgery_desc" >Image <small style="color:black">( SIZE : 500 x 500 )</small></label>
                                        <input type="file"  name="image[]" class="form-control" placeholder="Catagory Image" multiple>
                                        
                                        @if($errors->has('image'))
                                            <div class="alert alert-danger mt-1" role="alert">
                                                <strong>{{ 'Upload at least one image' }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="name" >Catalog</label>                                        
                                        <input type="file" class="form-control m-b-10" name="catalog" />
                                        
                                        @if($errors->has('name'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="surgery_desc" >Short Description</label>
                                        <textarea  class="form-control mt-1" name="short_description" rows="5"></textarea>
                                        
                                        @if($errors->has('short_description'))
                                            <div class="alert alert-danger mt-1" role="alert">
                                                <strong>{{ $errors->first('short_description') }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="surgery_desc" >Description</label>
                                        <style>#cke_1_contents{height: 300px!important;}</style>
                                        <textarea  class="form-control ckeditor" name="description" id="long_desc"></textarea>
                                        
                                        @if($errors->has('long_desc'))
                                            <div class="alert alert-danger mt-1" role="alert">
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
    
        CKEDITOR.replace( 'long_desc', {
            height: 400,
            filebrowserUploadUrl: "{{route('admin.ck_editor_image_upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        } );
        
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

        // $('#sub_category').change(function(){
        //     var sub_cat_id = $(this).val();
        //     $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });
        //         $.ajax({
        //             type:"GET",
        //             url:"{{ url('admin/pages/check/sub/category/')}}"+"/"+sub_cat_id,
        //             success:function(data){
        //                 if(data == 2){
        //                     alert('Sub Category Already Exist');
                        
        //                     $("#sub_category").html(html); 
        //                     $("#target").val($("#sub_category option:first").val());
        //                 }
        //             }
        //         });
        // })
    
    </script>    
@endsection


                   

                