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
                                <h2 class="site-text-primary">{{$knowledge->name}}</h2>
                            </div>
                        </div>
                        <!-- BREADCRUMB ROW -->                            
                        
                        <div>
                            <ul class="wt-breadcrumb breadcrumb-style-2">
                                <li><a href="{{route('web.index')}}">Home</a></li>
                                <li>{{$knowledge->name}}</li>
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
                        
                            <div class="col-lg-12 col-md-12 m-b30">
                                <div class="welcom-to-section">
                                    <!-- TITLE START-->
                                    <div class="site-list-style-two p-a10">
                                        {!!$knowledge->description!!}
                                    </div> 
                                </div>
                            </div>                             

                        </div>
                    </div> 
                </div>
            </div>   
            <!-- ABOUT SECTION  SECTION END -->   
                
            
        </div>
        <!-- CONTENT END -->

@endsection      
                
                