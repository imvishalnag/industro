        <!-- FOOTER START -->
        <footer class="site-footer footer-large footer-dark text-white" >        
            <!-- FOOTER BLOCKES START -->  
            <div class="footer-top bg-no-repeat bg-bottom-right" style="background-image:url({{asset('web/images/background/footer-bg.png')}})">
                <div class="container-fluid">
                    <div class="row">
                    
                        <div class="col-lg-5 col-md-12 col-sm-12"> 
                        	<div class="footer-h-left"> 
                                <div class="widget widget_about">
                                    <div class="logo-footer clearfix">
                                        <a href="index.html"><img src="{{asset('web/images/logo.webp')}}" alt="" ></a>
                                    </div>
                                 </div>
                                <div class="widget recent-posts-entry mb-0">
                                   <ul class="widget_address"> 
                                        <li><i class="fa fa-envelope"></i>info@hdtnm.com</li>
                                        <li> <i class="fa fa-phone"></i>0361 6774480 / 9101177485</li>
                                        <li style="line-height: 1.4;"><i class="fa fa-map-marker"></i><strong style="color: black">HD ENGINEERING & SERVICES</strong><br />ASIDC Head office complex, Bamunimaidan, near guwahati college bus stop, opp. sani mandir, Guwahati-781021</li>
                                        <li style="line-height: 1.4;"><i class="fa fa-clock-o"></i><strong style="color: black">OPENING HOURS</strong> <br />
                                            Monday to Saturday : 9:30 AM to 7:00 PM <br />
                                            Sunday : Closed
                                        </li>
                                    </ul>  
                                </div>
                            </div>                              
                            
                        </div> 

						<div class="col-lg-7 col-md-12 col-sm-12">
                        	<div class="row footer-h-right">
                            	<div class="col-lg-7 col-md-4">
                                    <div class="widget widget_services">
                                        <h3 class="widget-title">Useful links</h3>
                                        <ul>
                                            <li><a href="{{route('web.index')}}">Home</a></li>
                                            <li><a href="{{route('web.about')}}">About</a></li>
                                            <li><a href="{{route('web.contact')}}">Contact Us</a></li>                                     
                                            <li><a href="#">Service Related Quaries Registration</a></li>
                                            <li><a href="#">Customer Support Contact & Email</a></li>
                                        </ul>
                                    </div>
                            	</div>

                            	<div class="col-lg-5 col-md-8">
                                    <div class="widget widget_services">
                                        <h3 class="widget-title">Additional links</h3>
                                        <ul>
                                            @foreach ($header_data['knowledge'] as $item)
                                            <li><a href="{{route('web.knowledge',['slug'=> $item->name, 'id'=> $item->id ])}}">{{$item->name}}</a></li>
                                            @endforeach   
                                            <li><a href="#">Feedback</a></li>   
                                        </ul>
                                    </div>
                            	</div>     

                            	<div class="col-lg-12 col-md-12">
                                    <h3 class="widget-title">Social Media Handels</h3>
                                    <ul class="social-icons  wt-social-links footer-social-icon">
                                        <li><a href="javascript:void(0);" class="fa fa-google"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-rss"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
                                    </ul> 
                            	</div>                                
                            
                            </div>
                            
                        </div> 

                    </div>
                </div>
            </div>
            <!-- FOOTER COPYRIGHT -->
            
            <div class="footer-bottom">
              <div class="container-fluid">
                <div class="wt-footer-bot-left d-flex justify-content-center">
                    <span class="copyrights-text">Copyright © 2022 <span class="site-text-primary">HD Engineering </span> | Designed and Developed By <a href="https://softnue.com/" target="_blank"><span class="site-text-primary">Softnue </span> </a></span>
                    {{-- <ul class="copyrights-nav"> 
                        <li><a href="javascript:void(0);">Terms  &amp; Condition</a></li>
                        <li><a href="javascript:void(0);">Privacy Policy</a></li> 
                        <li><a href="contact-1.html">Contact Us</a></li>--}}
                    </ul>     
                </div>
              </div>   
            </div>   


        </footer>
        <!-- FOOTER END -->

        <!-- Get In Touch -->                            
        <div class="contact-slide-hide bg-cover bg-no-repeat" style="background-image:url({{asset('web/images/background/bg-7.jpg')}})"> 
            <div class="contact-nav">
                 <a href="javascript:void(0)" class="contact_close">&times;</a>
                 <div class="contact-nav-form">
                    <div class="contact-nav-info bg-white p-a30 bg-center bg-no-repeat" style="background-image:url({{asset('web/images/background/bg-map2.png')}});">
                    	<div class="row">
                        	<div class="col-lg-6 col-md-6">
                                <div class="contact-nav-inner text-black">
                                    <!-- TITLE START -->
                                    <h2 class="m-b30">Contact Info</h2>
                                    <!-- TITLE END -->
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="wt-icon-box-wraper left icon-shake-outer">
                                                    <div class="icon-content">
                                                        <h4 class="m-t0 m-t0 mb-0">Phone number</h4>
                                                        <p>0361 6774480</p>
                                                        <p>9101177485</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="wt-icon-box-wraper left icon-shake-outer">
                                                    <div class="icon-content">
                                                        <h4 class="m-t0 m-t0 mb-0">Email address</h4>
                                                        <p>info@hdtnm.com</p>
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="col-lg-12 col-md-12">
                                                <div class="wt-icon-box-wraper left icon-shake-outer">
                                                    <div class="icon-content">
                                                        <h4 class="m-t0 m-t0 mb-0">Address info</h4>
                                                        <p><strong style="color: black">HD ENGINEERING & SERVICES</strong><br />ASIDC Head office complex, Bamunimaidan, near guwahati college bus stop, opp. sani mandir, Guwahati-781021</p>
                                                    </div>
                                                </div>
                                            </div>
                                      </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <form id="quote-form" class="cons-contact-form">
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">  
                                    <div class="m-b30">
                                        <!-- TITLE START -->
                                         <h2 class="m-b30">Get In Touch</h2>
                                        <!-- TITLE END --> 
                                            <div id="qalertone"></div>
                                            <div class="row">
                                               <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <input name="type" id="qtype" type="hidden" value="4">
                                                        <input name="name" id="qname" type="text" required class="form-control" placeholder="Name">
                                                        <span id="qname_err" class="error"></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <input name="phone" id="qphone" type="text" class="form-control" required placeholder="Phone">
                                                        <span id="qphone_err" class="error"></span>
                                                     </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <textarea name="message" id="qmessage" class="form-control" rows="4" placeholder="Message"></textarea>
                                                       <span id="qmessage_err" class="error"></span>
                                                     </div>
                                                </div>
                                                
                                               <div class="col-md-12">
                                                    <button type="submit" id="submit" class="site-button site-btn-effect">Submit Now</button>
                                                </div>
                                                
                                            </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                                                                                        
                 </div>
            </div> 
        </div>     
        
        <!-- BUTTON TOP START -->
		<button class="scroltop"><span class="fa fa-angle-up  relative" id="btn-vibrate"></span></button>
 	</div>

<!-- LOADING AREA START ===== -->
<div class="loading-area">
    <div class="loading-box"></div>
    <div class="loading-pic">
    
        <div class="loader">
            <span class="block-1"></span>
            <span class="block-2"></span>
            <span class="block-3"></span>
            <span class="block-4"></span>
            <span class="block-5"></span>
            <span class="block-6"></span>
            <span class="block-7"></span>
            <span class="block-8"></span>
            <span class="block-9"></span>
            <span class="block-10"></span>
            <span class="block-11"></span>
            <span class="block-12"></span>
            <span class="block-13"></span>
            <span class="block-14"></span>
            <span class="block-15"></span>
            <span class="block-16"></span>
        </div>
    </div>
</div>
<!-- LOADING AREA  END ====== -->

<!-- JAVASCRIPT  FILES ========================================= --> 
<script  src="{{asset('web/js/jquery-2.2.0.min.js')}}"></script><!-- JQUERY.MIN JS -->
<script  src="{{asset('web/js/popper.min.js')}}"></script><!-- POPPER.MIN JS -->
<script  src="{{asset('web/js/bootstrap.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->
<script  src="{{asset('web/js/bootstrap-select.min.js')}}"></script><!-- Form js -->
<script  src="{{asset('web/js/magnific-popup.min.js')}}"></script><!-- MAGNIFIC-POPUP JS -->
<script  src="{{asset('web/js/waypoints.min.js')}}"></script><!-- WAYPOINTS JS -->
<script  src="{{asset('web/js/counterup.min.js')}}"></script><!-- COUNTERUP JS -->
<script  src="{{asset('web/js/waypoints-sticky.min.js')}}"></script><!-- STICKY HEADER -->
<script  src="{{asset('web/js/isotope.pkgd.min.js')}}"></script><!-- MASONRY  -->
<script  src="{{asset('web/js/owl.carousel.min.js')}}"></script><!-- OWL  SLIDER  -->
<script  src="{{asset('web/js/stellar.min.js')}}"></script><!-- PARALLAX BG IMAGE   -->
<script  src="{{asset('web/js/theia-sticky-sidebar.js')}}"></script><!-- STICKY SIDEBAR  -->
<script  src="{{asset('web/js/jquery.bootstrap-touchspin.js')}}"></script><!-- FORM JS -->
<script  src="{{asset('web/js/custom.js')}}"></script><!-- CUSTOM FUCTIONS  -->
<script  src="{{asset('web/js/lc_lightbox.lite.js')}}" ></script><!-- IMAGE POPUP -->
<script  src="{{asset('web/js/switcher.js')}}"></script><!-- SHORTCODE FUCTIONS  -->

<!-- REVOLUTION JS FILES -->

<script  src="{{asset('web/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script  src="{{asset('web/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->	
<script  src="{{asset('web/plugins/revolution/revolution/js/extensions/revolution-plugin.js')}}"></script>

<!-- REVOLUTION SLIDER SCRIPT FILES -->
<script  src="{{asset('web/js/rev-script-10.js')}}"></script>

@yield('script')

{{-- Request Quate --}}
<script>
    $('#quote-form').on('submit', function(e){
        e.preventDefault();
        name = $('#qname').val();
        phone = $('#qphone').val();
        message = $('#qmessage').val();
        type = $('#qtype').val();
                
        if(!name || !phone || !message){
            if(!name){
                $('#qname_err').html('').show();
                $('#qname_err').html('Please Enter Your Name').fadeOut(3000);
            }
            
            if(!phone){
                $('#qphone_err').html('').show();
                $('#pqphone_err').html('Please Enter Email').fadeOut(3000);
            
            }

            if(!message){
                $('#qmessage_err').html('').show();
                $('#mesqmessage_err').html('Please Enter Message').fadeOut(3000);
            }
        }else{
       
            var data = $(this).serializeArray();
            console.log(data);
        
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
              });
            $.ajax({
                url: "{{route('web.form_inquery_send')}}",
                method: "POST",
                data: data,
                success: function(response){
                    var html = '';
                    console.log(response)
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
                        $('#quote-form')[0].reset();
                    }
                    if(response.error){
                        html = '<div class="alert alert-danger">' + response.error + '</div>';
                    }
                    $("#qalertone").html(html);
                },
                error: function(xhr, textStatus, thrownError) {
                    console.log(' Error',xhr);
                }
            });
        }

    });
</script>
</body>
</html>
