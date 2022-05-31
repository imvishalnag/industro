@extends('admin.template.admin_master')
@section('content')
<div class="page-content-wrapper ">
    <div class="container-fluid">
        <div class="card m-b-20">
            <div class="card-body">
                <div style="display: flex;justify-content: space-between;margin-bottom: 10px;align-items: center;">
                    <h4 class="mt-0 header-title pull-left">Product Images</h4>
                </div>
                <div class="row">
                    @if(isset($page) && !empty($page) )

                        @foreach($page->images as $image)
                        <div class="col-md-2 col-xs-6">
                            <div class="thumbnail">
                                <div class="image" style="height: auto;">
                                    <img style="width: 100%; display: block;" src="{{ asset('backend_images/'.$image->image.'')}}" />
                                    @if($page->image == $image->image)
                                    <span class="badge badge-sm badge-primary" style="position: absolute;top: 5px;right: 13px;background: #0ec37a;">Thumb Image</span>
                                    @endif
                                </div>
                            </div>
                            @if($page->image !== $image->image)
                                <div class="thumbnail-btn-area">
                                    <a href="{{ route('admin.image.make_thumb',['image_id'=>$image->id ])}}" class="btn btn-xs btn-primary">Set As Thumb Image</a>
                                    <a href="{{ route('admin.image.delete',['image_id' =>$image->id])}}" class="btn btn-xs btn-danger" ><i class="fa fa-trash"></i></a>
                                </div>
                            @endif
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div> 
        
        {{-- Add More Images --}}
        <div class="card m-b-20">
            <div class="card-body">
                <form action="{{route('admin.image.add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div style="display: flex;justify-content: space-between;margin-bottom: 10px;align-items: center;">
                        <h4 class="mt-0 header-title pull-left">Add More Product Images</h4>
                    </div>
                    
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    
                    <div id="img_div">                        
                        <input type="hidden" name="product_id" value="{{ $page->id}}">                 
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="surgery_desc" >Image <small style="color:black">( SIZE : 500 x 500 )</small></label>
                            </div>
                            <div class="col-sm-8 pr-0">
                                <input type="file"  name="image[]" class="form-control" placeholder="Catagory Image" multiple>
                                
                                @if($errors->has('image'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ 'Upload at least one image'}}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-sm-4 pl-0">
                                <button type="submit" class="btn btn-success waves-effect waves-light spl-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                    
                    
                </form>
            </div>
        </div>  
    </div>
</div>

@endsection
@section('script')
@endsection