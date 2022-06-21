
@extends('web.template.master')

@section('content')
    <!-- CONTENT START -->
    <div class="page-content">
    
        <!-- INNER PAGE BANNER -->
        <div class="wt-bnr-inr overlay-wraper bg-center" style="background-image:url({{asset('web/images/banner/5.jpg')}});">
            <div class="overlay-main site-bg-secondry opacity-07"></div>
            <div class="container">
                <div class="wt-bnr-inr-entry">
                    <div class="banner-title-outer">
                        <div class="banner-title-name">
                            <h2 class="site-text-primary">Customer Support Contact & Email</h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->                            
                    
                    <div>
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{route('web.index')}}">Home</a></li>
                            <li>Customer Support Contact & Email</li>
                        </ul>
                    </div>
                    
                    <!-- BREADCRUMB ROW END -->                        
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->

        <!-- SECTION CONTENTG START -->
        
            <!-- CONTACT FORM -->
            <div class="section-full  p-t80 p-b50 bg-cover" style="background-image:url({{asset('web/images/background/bg-7.jpg')}})">   
            <div class="section-content">
                <div class="container">
                    <div class="contact-one">
                        <!-- CONTACT FORM-->
                        <div class="row  d-flex justify-content-center flex-wrap">
                            
                            <div class="col-lg-8 col-md-6 m-b30">
                                <div class="contact-info">
                                    <div class="contact-info-inner">
                                        
                                        <div class="contact-info-section" style="background-image:url({{asset('web/images/background/bg-map2.png')}});">  
                                                                                                
                                                <div class="wt-icon-box-wraper left m-b30">
                                                    
                                                    <div class="icon-content">
                                                        <h3 class="m-t0 site-text-primary">Phone number</h3>
                                                        <p>{{$contact->phone}}</p>
                                                    </div>
                                                </div>
    
                                                <div class="wt-icon-box-wraper left m-b30">
                                                    
                                                    <div class="icon-content">
                                                        <h3 class="m-t0 site-text-primary">Email address</h3>
                                                        <p>{{$contact->email}}</p>
                                                    </div>
                                                </div>
                                                
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                
                </div>
            </div>
        </div>         
        
    </div>
    <!-- CONTENT END -->

@endsection

@section('script')
@endsection