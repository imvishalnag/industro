
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
                            <li><a href="{{route('web.index')}}">Home</a></li>
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
                                <form id="contact-form" class="cons-contact-form">
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
                                    
                                    <div id="alertone"></div>
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">                 
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <input name="name" type="text" id="contact_name" required class="form-control" placeholder="Name">
                                                <span id="contact_name_err" style="color:red"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <input name="email" type="text" id="contact_email" class="form-control" required placeholder="Phone/Email">
                                                <span id="contact_email_err" style="color:red"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <input name="subject" type="text" id="contact_subject" class="form-control" required placeholder="Subject">
                                                <span id="contact_subject_err" style="color:red"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="message" id="contact_message" class="form-control" rows="6" placeholder="Message"></textarea>
                                                <span id="contact_message_err" style="color:red"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <button type="submit" id="submit" class="site-button site-btn-effect">Submit Now</button>
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
                                                        <p>0361 6774480 / 9101177485</p>
                                                    </div>
                                                </div>
    
                                                <div class="wt-icon-box-wraper left m-b30">
                                                    
                                                    <div class="icon-content">
                                                        <h3 class="m-t0 site-text-primary">Email address</h3>
                                                        <p>info@hdtnm.com</p>
                                                    </div>
                                                </div>

                                                <div class="wt-icon-box-wraper left m-b30">
                                                    
                                                    <div class="icon-content">
                                                        <h3 class="m-t0 site-text-primary">Address info</h3>
                                                        <p><strong style="color: #fff">HD ENGINEERING &amp; SERVICES</strong></p>
                                                        <p>ASIDC Head office complex, Bamunimaidan, near guwahati college bus stop, opp. sani mandir, Guwahati-781021</p>
                                                    </div>
                                                </div>

                                                <div class="wt-icon-box-wraper left">
                                                    
                                                    <div class="icon-content">
                                                        <h3 class="m-t0 site-text-primary">Opening Hours</h3>
                                                        <ul class="list-unstyled m-b0">
                                                            <li>Monday to Saturday : 9:30 AM to 7:00 PM</li>
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

@section('script')
    
<script>
    $('#contact_email').keyup(function(){
        var email = $(this).val();
        if(!isNaN(email)){
            $(this).attr('type','number');
            
        }
        if( $(this).val() == ''){
            $(this).attr('type','text');
            
        }
    });
    $('#contact-form').on('submit', function(e){
        e.preventDefault();
        name = $('#contact_name').val();
        email = $('#contact_email').val();
        subject = $('#contact_subject').val();
        message = $('#contact_message').val();
                
        if(!name || !email || !subject || !message){
            if(!name){
                $('#contact_name_err').html('').show();
                $('#contact_name_err').html('Please Enter Your Name').fadeOut(3000);
            }
            
            if(!email){
                $('#contact_email_err').html('').show();
                $('#contact_email_err').html('Please Enter Email').fadeOut(3000);
            
            }
            
            if(!subject){
                $('#contact_subject_err').html('').show();
                $('#contact_subject_err').html('Please Enter Subject').fadeOut(3000);
            }

            if(!message){
                $('#contact_message_err').html('').show();
                $('#contact_message_err').html('Please Enter Message').fadeOut(3000);
            }
        }else{
       
            var data = $(this).serializeArray();
            console.log(data);
        
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            });
            $.ajax({
                url: "{{route('web.add_contact')}}",
                method: "POST",
                data: data,
                success: function(response){
                    var html = '';
                    if(response.errors)
                    {
                        html = '<div class="alert alert-danger">';
                        for(var count = 0; count < response.errors.length; count++){
                            html += '<p>' + response.errors[count] + '</p>';
                        }
                        html += '</div>';
                    }
                    if(response.success){
                        html = '<div class="alert alert-success">' + response.success + '</div>';
                        $('#contact-form')[0].reset();
                    }
                    if(response.error){
                        html = '<div class="alert alert-danger">' + response.error + '</div>';
                    }
                    $("#alertone").html(html);
                }
            });
        }

    });
</script>
@endsection