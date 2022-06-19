@extends('admin.template.admin_master')

@section('content')

<div class="page-content-wrapper">
    <div class="container-fluid">        

        <div class="row">
            <div class="col-12">
                @if (Session::has('message'))
                    <div class="alert alert-success" >{{ Session::get('message') }}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <div class="card m-b-20">
                    <div class="card-body">                        
                        <h4 class="mt-0 header-title">View Case Study</h4>
                        <div>
                            <div><img src="{{asset('images/post/'.$single_post->image.'')}}" style="max-width: 100%;" alt="sd"></div>
                            <h4>{{ $single_post->title }}</h4> 
                            <hr> 
                            <label><strong>Short Description</strong></label>
                            <p>{{$single_post->body }}</p>
                            <hr> 
                            <label><strong>Long Description</strong></label>
                            <p>{!!$single_post->long_desc !!}</p>
                            <hr>
                            <small>Posted on {{$single_post->created_at}}</small>
                            <button class="btn btn-danger pull-right" onclick="window.close()">Close</button>
                            {{-- <button class="btn btn-primary pull-right">{{$single_post->c_name}}</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
 @endsection
 @section('script')
 <script src="{{ asset('admin/ckeditor4/ckeditor.js')}}"></script>
 <script>
     CKEDITOR.replace( 'body', {
         height: 400,
         filebrowserUploadUrl: "{{route('admin.ck_editor_image_upload', ['_token' => csrf_token() ])}}",
         filebrowserUploadMethod: 'form'
     } );

     $(document).ready(function(){

     });
 </script>
@endsection
