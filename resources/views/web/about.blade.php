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
                                <h2 class="site-text-primary">About Us</h2>
                            </div>
                        </div>
                        <!-- BREADCRUMB ROW -->                            
                        
                        <div>
                            <ul class="wt-breadcrumb breadcrumb-style-2">
                                <li><a href="{{route('web.index')}}">Home</a></li>
                                <li>About</li>
                            </ul>
                        </div>
                        
                        <!-- BREADCRUMB ROW END -->                        
                    </div>
                </div>
            </div>
            <!-- INNER PAGE BANNER END -->

            <!-- ABOUT SECTION START -->
            <div class="section-full welcome-section-outer">
                <div class="welcome-section-top bg-white p-t80 p-b50">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                        
                            <div class="col-lg-6 col-md-12 m-b30">
                                <div class="welcom-to-section">
                                    <!-- TITLE START-->
                                    <div class="left wt-small-separator-outer">
                                        <div class="wt-small-separator site-text-primary">
                                            <div  class="sep-leaf-left"></div>
                                            <div>Welcome to HD Engineering</div>
                                            <div  class="sep-leaf-right"></div>
                                        </div>
                                    </div>
                                    <div class="site-list-style-two p-a10">
                                        {!!$about->description!!}
                                    </div>

                                    <div class="welcom-to-section-bottom d-flex justify-content-between">
                                        <div class="welcom-btn-position"><a href="{{route('web.contact')}}" class="site-button-secondry site-btn-effect">Contact Us</a></div>
                                    </div>   
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-12 m-b30">
                                <div class="img-colarge2">
                                    <div class="colarge-2 slide-right"><img src="{{ asset('backend_images/'.$about->image_one.'')}}" alt=""></div>
                                    <div class="colarge-2-1"><img src="{{ asset('backend_images/'.$about->image_two.'')}}" alt=""></div>
                                    <div class="since-year-outer2"><div class="since-year2"><span>Since</span><strong>2015</strong></div></div>
                                </div>
                            </div>                              

                        </div>
                    </div> 
                </div>
            </div>   
            <!-- ABOUT SECTION  SECTION END -->
            
            <div class="section-full p-t50 p-b20 bg-gray">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12 col-md-12 m-b30">
                            <!-- TITLE START-->
                            <div class="section-head center wt-small-separator-outer mb-0">
                                <div class="wt-small-separator site-text-primary">
                                    <div class="sep-leaf-left"></div>
                                    <div>{{$about->heading}}</div>
                                    <div class="sep-leaf-right"></div>
                                </div>
                                <div>
                                    {!!$about->text!!}
                                </div>
                            </div>
                            <!-- TITLE END-->                                                                                 
                        </div>
                        
                   </div>
				</div>
                
            </div>
                
            <div class="section-full p-t10 p-b10 bg-white">
                <div class="container-fluid">

                   <div class="section-content">
                        <div class="owl-carousel h3-project-slider  mfp-gallery">
                        <!-- COLUMNS 1 --> 
                        @foreach ($about_image as $item)
                        <div class="item">
                            <div class="line-filter-outer">
                                <div class="line-filter-media">
                                    <img src="{{asset('backend_images/'.$item->image.'')}}" alt="">  
                                </div>
                            </div>
                        </div>                            
                        @endforeach                

                    </div>                                                                                    
                   </div>               
                </div>
            </div>
            
        </div>
        <!-- CONTENT END -->

@endsection      
                
                