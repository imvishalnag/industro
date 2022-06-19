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
                                <li>Case Study</li>
                            </ul>
                        </div>
                        
                        <!-- BREADCRUMB ROW END -->                        
                    </div>
                </div>
            </div>
            <!-- INNER PAGE BANNER END -->

            <!-- ABOUT SECTION START -->
            <div class="section-full  p-t80  bg-white blog-post-outer-3 ">
				<div class="container">
                
                	<div class="wt-separator-two-part">
                    	<div class="row wt-separator-two-part-row">
                        	<div class="col-lg-8 col-md-7 wt-separator-two-part-left">
                                <!-- TITLE START-->
                                <div class="section-head left wt-small-separator-outer">
                                    <div class="wt-small-separator site-text-primary">
                                        <div class="sep-leaf-left"></div>
                                        <div>Latest Case Study</div>
                                        <div class="sep-leaf-right"></div>
                                    </div>
                                </div>
                                <!-- TITLE END-->
                            </div>
                    	</div>
                    </div>
     
                    <!-- BLOG SECTION START -->
                    <div class="section-content">
                        <div class="row d-flex">
                            @foreach ($case_study as $item)
                            <div class="col-lg-4 col-md-6 col-sm-12 m-b30">
                                <!--Block one-->
                                <div class="blog-post date-style-2">
                                    <div class="wt-post-media wt-img-effect zoom-slow">
                                        <a href="javascript:;"><img src="{{asset('images/post/'.$item->image.'')}}" alt=""></a>
                                    </div>
                                    <div class="wt-post-info bg-white p-t30">
                                        <div class="wt-post-meta ">
                                            <ul>
                                                <li class="post-date">{{$item->created_at->format('d F, Y')}}</li>
                                            </ul>
                                        </div>                                 
                                        <div class="wt-post-title ">
                                            <h3 class="post-title">{{$item->title}}</h3>
                                        </div>
                                        <div class="wt-post-readmore ">
                                            <a href="{{route('web.case_study.detail',['blog_id'=>$item->id])}}" class="site-button-link black">Read More</a>
                                        </div>                                        
                                   </div>                                
                                </div>
                            </div>
                            @endforeach
                                                        
                        </div>
                    </div>
                </div>
                
             </div>  
            <!-- ABOUT SECTION  SECTION END -->   
                
            
        </div>
        <!-- CONTENT END -->

@endsection      
                
                