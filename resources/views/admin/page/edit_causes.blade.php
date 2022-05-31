@extends('admin.template.admin_master')
@section('content')
@if(isset($causes) && !empty($causes) && count($causes)>0)
    <div class="container">
        <h3>Edit Causes</h3>
        <label >Image <small style="color: red">(200*200 px)</small></label>
        @foreach($causes as $data)
            <div class="card m-b-20">
                <div class="card-body">
                    <form method="POST" action="{{route('admin.update_causes')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-sm-8">
                                <input type="text" class="form-control m-b-10" value="{{$data->name}}" name="update_title"/>
                                <input type="hidden" name="cause_id" value="{{$data->id}}">
                                @if($errors->has('update_title'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('update_title') }}</strong>
                                    </div>
                                @enderror
                                <input type="file" class="form-control" name="update_image"/>
                                @if($errors->has('update_image'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('update_image') }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <img style="height:90px;width:90px;" src="{{asset('images/causes/photo/'.$data->image)}}"/>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{route('admin.delete_causes',['causes_id'=>$data->id])}}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>        
        @endforeach
    </div>
@endif

<div class="container">
    <h3>Add More Causes</h3>
    <div class="card m-b-20">
        <div class="card-body">
            <form method="POST" action="{{route('admin.add_causes')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-5">
                        <input type="text" class="form-control"  name="title" placeholder="Causes title"/>
                        <input type="hidden" name="page_id" value="{{$page_id}}">
                        @if($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-5">
                        <input type="file" class="form-control" name="image"/>
                        @if($errors->has('image'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-warning">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div style="text-align:center">
        <hr>
        @if($page->causes_status == 1)
            <a class="btn btn-danger" href="{{route('admin.causes.status',['page_id'=>$page_id,'status'=>2])}}">Disable Causes Section</a>
        @else
            <a class="btn btn-success" href="{{route('admin.causes.status',['page_id'=>$page_id,'status'=>1])}}">Enable Causes Section</a>
        @endif
    </div>
</div>

@endsection
@section('script')
@endsection