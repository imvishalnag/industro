@extends('admin.template.admin_master')
@section('content')
@if(isset($faq) && !empty($faq) && count($faq)>0)
    <div class="container">
        <h3>Edit Faq</h3>
        @foreach($faq as $data)
        <div class="card m-b-20">
            <div class="card-body">
                <form method="POST" action="{{route('admin.update_faq')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-5">
                            <label for="old_questions" >Questions</label>
                            <input type="text" class="form-control m-b-10" name="old_questions" value="{{$data->question}}" >
                            <input type="hidden" value="{{$data->id}}" name="faq_id">
                            @if($errors->has('old_questions'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('old_questions') }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-7">
                            <label for="old_answers" >Answers</label>
                            <textarea class="form-control" name="old_answers" rows="3"> {{$data->answer}}</textarea>                        
                            @if($errors->has('old_answers'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ $errors->first('old_answers') }}</strong>
                                </div>
                            @enderror                        
                        </div>
                        <div class="col-sm-12">                            
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{route('admin.delete_faq',['faq_id'=>$data->id])}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>        
        @endforeach
    </div>
@endif

<div class="container">
    <h3>Add More faq</h3>
    <div class="card m-b-20">
        <div class="card-body">
            <form method="POST" action="{{route('admin.add_new_faq')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-5">
                        <label for="questions" >Questions</label>
                        <input type="text" class="form-control" name="questions"  >
                        <input type="hidden" value="{{$page_id}}" name="page_id">
                    @if($errors->has('questions'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $errors->first('questions') }}</strong>
                        </div>
                    @enderror
                    </div>
                    <div class="col-sm-7">
                        <label for="answers" >Answers</label> 
                        <textarea class="form-control" name="answers" rows="3"> </textarea>
                    
                        @if($errors->has('answers'))
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $errors->first('answers') }}</strong>
                            </div>
                        @enderror                    
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-warning">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div style="text-align:center">
        <hr>
        @if($page->faq_status == 1)
            <a class="btn btn-danger" href="{{route('admin.faq.status',['page_id'=>$page_id,'status'=>2])}}">Disable Faq Section</a>
        @else
            <a class="btn btn-success" href="{{route('admin.faq.status',['page_id'=>$page_id,'status'=>1])}}">Enable Faq Section</a>
        @endif
    </div>
</div>
  
@endsection
@section('script')
@endsection