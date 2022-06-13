@extends('admin.template.admin_master')
@section('content')
{{-- @if(isset($causes) && !empty($causes) && count($causes)>0) --}}
    <div class="container-fluid">
        <div class="card m-b-20">
            <div class="card-body">
                
                {{-- Message Area --}}
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif

                <h4 class="mt-0 header-title">Home Product </h4>
                <form method="POST" action="{{route('admin.home_product_update', ['id'=>$home_product->id])}}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-5">
                            <label for="category" class="col-form-label">Category</label>
                            <select class="form-control m-b-10" name="sub_cat_id" id="sub_category">
                                <option>Select Sub Catagory</option>
                                @foreach($sub_category as $value)
                                    <option value="{{$value->id}}" {{isset($value) && $value->id == $home_product->sub_cat_id?'selected':''}}>{{$value->name}}</option>
                                @endforeach
                            </select>
                            {{-- @if($errors->has('update_title'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('update_title') }}</strong>
                                </div>
                            @enderror --}}
                        </div>
                        <div class="col-sm-5">
                            <label for="category" class="col-form-label">Product</label>
                            <select class="form-control" id="product" name="product_id">
                                @foreach($page as $item)
                                    <option value="{{$item->id}}" {{isset($item) && $item->id == $home_product->product_id?'selected':''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            {{-- @if($errors->has('update_title'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('update_title') }}</strong>
                                </div>
                            @enderror --}}
                        </div>
                        <div class="col-sm-2 text-center">
                            <img style="height:90px;width:90px;" src="{{ asset('backend_images/'.$home_product->page->image.'')}}"/>
                            <h6>{{$home_product->page->name}}</h6>
                        </div>
                        <div class="col-sm-12">
                            <a href="{{route('admin.home_product_view')}}" class="btn btn-danger">Go Back</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>
{{-- @endif --}}

@endsection
@section('script')
<script>
    $('#sub_category').change(function() {
        var sub_cat_id = $(this).val();
        console.log('Data',sub_cat_id);
        
        if(sub_cat_id){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:"GET",
                url:"{{ url('admin/product/find')}}"+"/"+ sub_cat_id,
                success:function(data){                
                    if ($.isEmptyObject(data)) {
                            $("#product").html("<option value=''>No Product Found</option>"); 
                    }else { 
                        html='';
                        $("#product").html("<option value=''>Select Product</option>"); 
                        html+=`<option value=''>Select Product</option>`;
                        $.each( data, function( key, value ) {
                            $("#product").append("<option value='"+value.id+"'>"+value.name+"</option>");                            
                            html+=`<option value='${value.id}'>${value.name}</option>`;
                        });
                    }                
                }
            });
        }else{
            alert('Select Top Category First');
            $("#product").html('');

        }
    });
</script>
@endsection