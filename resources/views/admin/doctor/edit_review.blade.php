@extends('admin.template.admin_master')
@section('content')
@if(isset($review) && !empty($review) && count($review)>0)
    <div class="container">
        <h3>Edit Reviews</h3>
        @foreach($review as $data)
        <span style="color:red">Image Should Be In Size Of 60x60 </span>
        <div class="card m-b-20">
            <div class="card-body">
                <form method="POST" action="{{route('admin.doctor.update_review')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-8">
                            <input type="text" class="form-control m-b-10" value="{{$data->title}}" name="title"/>
                            <input type="hidden" name="review_id" value="{{$data->id}}">
                            @if($errors->has('title'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </div>
                            @enderror
                            <input type="file" class="form-control" name="image"/>
                            @if($errors->has('image'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </div>
                            @enderror
                            <textarea  class="form-control" name="desc">{{$data->desc}}</textarea>
                            @if($errors->has('desc'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('desc') }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-2">
                            <img style="height:90px;width:90px;" src="{{asset('images/doctor/photo/'.$data->image)}}"/>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{route('admin.doctor.remove_review',['review_id'=>$data->id])}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>        
        @endforeach
    </div>
@endif

<div class="container">
    <h3>Add More Reviews</h3>
    <div class="card m-b-20">
        <div class="card-body">
            <form method="POST" action="{{route('admin.doctor.add_review')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control"  name="title" placeholder="Name"/>
                        <input type="hidden" name="doctor_id" value="{{$doctor_id}}">
                        @if($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <span style="color:red">Image Should Be In Size Of 60x60 </span>
                        <input type="file" class="form-control" name="image"/>
                        @if($errors->has('image'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="desc"></textarea>
                        @if($errors->has('desc'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('desc') }}</strong>
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
        @if($doctor->has_review == 1)
            <a class="btn btn-danger" href="{{route('admin.doctor.review_status',['doctor_id'=>$doctor_id])}}">Disable Reviews Section</a>
        @else
            <a class="btn btn-success" href="{{route('admin.doctor.review_status',['doctor_id'=>$doctor_id])}}">Enable Reviews Section</a>
        @endif
    </div>
</div>
  
@endsection
@section('script')
@endsection