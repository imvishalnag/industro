@extends('admin.template.admin_master')
@section('content')
@if(isset($overview) && !empty($overview) && count($overview)>0)
    <div class="container">
        <h3>Edit Overview</h3>
        @foreach($overview as $data)
        <div class="card m-b-20">
            <div class="card-body">
                <form method="POST" action="{{route('admin.update_overview')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="title" >Title</label>
                            <input type="text" class="form-control" name="title" value="{{$data->head}}" >
                            <input type="hidden" value="{{$data->id}}" name="overview_id">
                            @if($errors->has('title'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-12">
                            <label for="description" >Description</label>
                            <textarea class="form-control ckeditor" name="description" > {{$data->description}}</textarea>                        
                            @if($errors->has('description'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </div>
                            @enderror                        
                        </div>
                        <div class="col-sm-12 m-t-10">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{route('admin.delete_overview',['overview_id'=>$data->id])}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        @endforeach
    </div>
@endif

<div class="container">
    <h3>Add More Overview</h3>
    <div class="card m-b-20">
        <div class="card-body">
            <form method="POST" action="{{route('admin.add_new_overview')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <label for="new_title" >Title</label>
                        <input type="text" class="form-control" name="new_title"  >
                        <input type="hidden" value="{{$page_id}}" name="page_id">
                    @if($errors->has('new_title'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $errors->first('new_title') }}</strong>
                        </div>
                    @enderror
                    </div>
                    <div class="col-sm-12">
                        <label for="new_description" >Description</label>
                        <textarea class="form-control ckeditor" name="new_description"  > </textarea>
                    
                    @if($errors->has('new_description'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $errors->first('new_description') }}</strong>
                        </div>
                    @enderror
                    
                    </div>
                <div class="col-sm-12 m-t-10">
                    <button type="submit" class="btn btn-warning">Add</button>
                </div>
                </div>
            </form>
        </div>
    </div>

    <div style="text-align:center">
        <hr>
        @if($page->overview_status == 1)
            <a class="btn btn-danger" href="{{route('admin.overview.status',['page_id'=>$page_id,'status'=>2])}}">Disable Overview Section</a>
        @else
            <a class="btn btn-success" href="{{route('admin.overview.status',['page_id'=>$page_id,'status'=>1])}}">Enable Overview Section</a>
        @endif
    </div>
</div>

  
@endsection
@section('script')
<script src="{{ asset('admin/ckeditor4/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replaceClass="ckeditor";
</script>
@endsection