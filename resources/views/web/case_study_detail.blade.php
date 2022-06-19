@extends('web.template.master')

@section('content')
        <!-- CONTENT START -->
        <div class="page-content">

            <!-- INNER PAGE BANNER -->
            <div class="wt-bnr-inr overlay-wraper bg-center" style="background-image:url({{asset('web/images/banner/3.jpg')}});">
                <div class="overlay-main site-bg-secondry opacity-09"></div>
                <div class="container">
                    <div class="wt-bnr-inr-entry">
                        <div class="banner-title-outer">
                            <div class="banner-title-name">
                                <h2 class="site-text-primary">Case Study</h2>
                            </div>
                        </div>
                        <!-- BREADCRUMB ROW -->                            
                        
                        <div>
                            <ul class="wt-breadcrumb breadcrumb-style-2">
                                <li><a href="{{route('web.index')}}">Home</a></li>
                                <li>Case Study Detail</li>
                            </ul>
                        </div>
                        
                        <!-- BREADCRUMB ROW END -->                        
                    </div>
                </div>
            </div>
            <!-- INNER PAGE BANNER END -->

             <!-- OUR BLOG START -->
             <div class="section-full  p-t80 p-b50 bg-white">
				<div class="container">
                
                    <!-- BLOG SECTION START -->
                    <div class="section-content">
                        <div class="row d-flex justify-content-center">
                        
                            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 m-b30">
                               <!-- BLOG START -->
                                <div class="blog-post date-style-2 blog-lg">
                                    <div class="wt-post-media wt-img-effect zoom-slow">
                                        <a href="javascript:;"><img src="{{asset('images/post/'.$blog_detail->image.'')}}" alt=""></a>
                                    </div>
                                    <div class="wt-post-info  bg-white p-t30">
                                        <div class="wt-post-meta ">
                                            <ul>
                                                <li class="post-date">{{$blog_detail->created_at->format('d F, Y')}}</li>
                                            </ul>
                                        </div>                                 
										<div class="wt-post-title ">
                                            <h2 class="post-title">{{$blog_detail->title}}</h2>
                                        </div>
                                       
                                        <div class="wt-post-text">
                                            {!!$blog_detail->long_desc!!}
                                        </div>  
                                                        
                                    </div>
                                </div>  
                                <!-- BLOG END -->	
                                 
                            </div>                      
                        </div>
                                                 
                    </div>
                    
                </div>
                
             </div>   
            <!-- OUR BLOG END --> 
                
            
        </div>
        <!-- CONTENT END -->

@endsection      
                
                