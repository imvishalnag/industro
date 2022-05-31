
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
                            <h2 class="site-text-primary">Contact Us</h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->                            
                    
                        <div>
                            <ul class="wt-breadcrumb breadcrumb-style-2">
                                <li><a href="index.php">Home</a></li>
                                <li>Contact Us</li>
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
                        
                            <div class="col-lg-6 col-md-6 m-b30">
                                <form  class="cons-contact-form" method="post" action="http://thewebmax.com/industro/form-handler2.php">
                                    <!-- TITLE START -->
                                    <div class="section-head left wt-small-separator-outer">
                                        <div class="wt-small-separator site-text-primary">
                                            <div class="sep-leaf-left"></div>
                                            <div>Contact Form</div>
                                            <div class="sep-leaf-right"></div>
                                        </div>
                                        <h2>Get In Touch</h2>
                                    </div>                                                                                
                                    <!-- TITLE END --> 
                                                                            
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <input name="username" type="text" required class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <input name="email" type="text" class="form-control" required placeholder="Email">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <input name="phone" type="text" class="form-control" required placeholder="Phone">
                                                </div>
                                        </div>
                                        
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                    <input name="subject" type="text" class="form-control" required placeholder="Subject">
                                                </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" rows="4" placeholder="Message"></textarea>
                                                </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <button type="submit" class="site-button site-btn-effect">Submit Now</button>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 m-b30">
                                <div class="contact-info">
                                    <div class="contact-info-inner">
                                            
                                        <!-- TITLE START-->
                                        <div class="section-head left wt-small-separator-outer">
                                            <div class="wt-small-separator site-text-primary">
                                                <div class="sep-leaf-left"></div>
                                                <div>Contact info</div>
                                                <div class="sep-leaf-right"></div>
                                            </div>
                                            <h2>Our Full Info</h2>
                                        </div>                                                                                           
                                        <!-- TITLE END--> 
                                        
                                        <div class="contact-info-section" style="background-image:url({{asset('web/images/background/bg-map2.png')}});">  
                                                                                                
                                                <div class="wt-icon-box-wraper left m-b30">
                                                    
                                                    <div class="icon-content">
                                                        <h3 class="m-t0 site-text-primary">Phone number</h3>
                                                        <p>(+291) 0987 654 321</p>
                                                    </div>
                                                </div>
    
                                                <div class="wt-icon-box-wraper left m-b30">
                                                    
                                                    <div class="icon-content">
                                                        <h3 class="m-t0 site-text-primary">Email address</h3>
                                                        <p>thewebmax@gmail.com</p>
                                                    </div>
                                                </div>

                                                <div class="wt-icon-box-wraper left m-b30">
                                                    
                                                    <div class="icon-content">
                                                        <h3 class="m-t0 site-text-primary">Address info</h3>
                                                        <p>1363-1385 Sunset Blvd Los Angeles, CA 90026, USA</p>
                                                    </div>
                                                </div>

                                                <div class="wt-icon-box-wraper left">
                                                    
                                                    <div class="icon-content">
                                                        <h3 class="m-t0 site-text-primary">Opening Hours</h3>
                                                        <ul class="list-unstyled m-b0">
                                                            <li>Mon-Fri: 9 am – 6 pm</li>
                                                            <li>Saturday: 9 am – 4 pm</li>
                                                            <li>Sunday: Closed</li>
                                                        </ul>
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
        
            <!-- GOOGLE MAP -->
            <div class="section-full bg-white p-tb80">   
            <div class="section-content">
                <div class="container">
                    <div class="gmap-outline">
                        <div id="gmap_canvas2" class="google-map"></div>
                    </div>
                </div>
            </div>
        </div>           
        
    </div>
    <!-- CONTENT END -->

@endsection    