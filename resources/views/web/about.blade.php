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
                                    <li><a href="index.php">Home</a></li>
                                    <li>About 1</li>
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
                                            <div>Welcome to JB</div>
                                            <div  class="sep-leaf-right"></div>
                                        </div>
                                    </div>
                                    <h2>We Are Here to Increase Your Knowledge With Experience</h2>
                                    <!-- TITLE END-->
                                    <ul class="site-list-style-one">
                                        <li>Quality Control System , 100% Satisfaction Guarantee</li>
                                        <li>Unrivalled Workmanship, Professional and Qualified</li>
                                        <li>Environmental Sensitivity, Personalised Solutions</li>
                                    </ul>
                                    
                                    <p>Progressively maintain extensive infomediaries via extensible nich. Capitalize on low hanging fruit. a ballpark value added is activity to beta test. Override the digital divide with additional click throughs from fruit to identify a ballpark value added.</p> 
                                    
                                    <div class="welcom-to-section-bottom d-flex justify-content-between">
                                        <div class="welcom-btn-position"><a href="about-2.html" class="site-button-secondry site-btn-effect">More About</a></div>
                                    </div>   
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-12 m-b30">
                                <div class="img-colarge2">
                                    <div class="colarge-2 slide-right"><img src="{{asset('web/images/colarge/s2.jpg')}}" alt=""></div>
                                    <div class="colarge-2-1"><img src="{{asset('web/images/colarge/s1.jpg')}}" alt=""></div>
                                    <div class="since-year-outer2"><div class="since-year2"><span>Since</span><strong>2015</strong></div></div>
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
                
                