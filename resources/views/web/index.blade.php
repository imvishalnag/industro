@extends('web.template.master')
        
@section('content')
        <!-- CONTENT START -->
        <div class="page-content">
        
            <!-- SLIDER START --> 
            <div class="slider-outer">

                <div class="main-slider style-two default-banner">
                    <div class="tp-banner-container">
                        <div class="tp-banner" >
                            <!-- START REVOLUTION SLIDER 5.4.1 -->
                            <div id="rev_slider_26_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="mask-showcase" data-source="gallery" style="background:#aaaaaa;padding:0px;">

                                <div id="rev_slider_26_1" class="rev_slider fullscreenbanner tiny_bullet_slider" style="display:none;" data-version="5.4.1">
                                    <ul>	
                                        <!-- SLIDE 1 -->
                                        <li data-index="rs-73" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="Slide">

                                        <!-- MAIN IMAGE -->
                                        <img src="{{asset('web/images/main-slider/slider10/slide1-blur.jpg')}}" alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg">
                                        <!-- LAYERS -->
                                        
                                        <!-- LAYER 1 [ for overlay ] -->
                                        <div class="tp-caption tp-shape tp-shapewrapper " 
                                            id="slide-73-layer-1" 
                                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                                            data-width="full"
                                            data-height="full"
                                            data-whitespace="nowrap"
                                            data-type="shape" 
                                            data-basealign="slide" 
                                            data-responsive_offset="off" 
                                            data-responsive="off"
                                            data-frames='[
                                            {"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},
                                            {"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}
                                            ]'
                                            data-textAlign="['left','left','left','left']"
                                            data-paddingtop="[0,0,0,0]"
                                            data-paddingright="[0,0,0,0]"
                                            data-paddingbottom="[0,0,0,0]"
                                            data-paddingleft="[0,0,0,0]"
                                            
                                            style="z-index:2;background-color:rgba(0, 0, 0, 0.5);border-color:rgba(0, 0, 0, 0);border-width:0px;"> 
                                        </div>  

                                        <!-- LAYER NR. 2 -->
                                        <div class="tp-caption   tp-resizeme" 
                                            id="slide-73-layer-2" 
                                            data-x="['left','left','center','center']" data-hoffset="['0','0','0','0']" 
                                            data-y="['middle','middle','middle','middle']" data-voffset="['-150','-150','-200','-200']" 
                                            data-width="['650','650','620','380']"
                                            data-height="none"
                                            data-whitespace="normal"
                                    
                                            data-type="text" 
                                            data-responsive_offset="on" 
                                    
                                            data-frames='[{"delay":300,"speed":750,"sfxcolor":"#ddd","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                            {"delay":"wait","speed":500,"sfxcolor":"#ffffff","sfx_effect":"blocktoleft","frame":"999","to":"z:0;","ease":"Power4.easeOut"}]'
                                            data-textAlign="['left','left','center','center']"
                                            data-paddingtop="[10,10,10,10]"
                                            data-paddingright="[20,20,20,20]"
                                            data-paddingbottom="[10,10,10,10]"
                                            data-paddingleft="[20,20,20,20]"
                                    
                                            style="z-index: 7; font-size: 24px; line-height: 24px; font-weight: 600; color: #ffffff; letter-spacing: 4px;font-family: 'Teko', sans-serif;">High Performance</div>
                                    
                                        <!-- LAYER NR. 3 -->
                                        <div class="tp-caption   tp-resizeme" 
                                            id="slide-73-layer-3" 
                                            data-x="['left','left','center','center']" data-hoffset="['0','0','0','0']" 
                                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','-100','-120']" 
                                            data-fontsize="['100','100','60','40']"
                                            data-lineheight="['100','100','60','40']"
                                            data-width="['700','650','620','380']"
                                            data-height="none"
                                            data-whitespace="normal"
                                    
                                            data-type="text" 
                                            data-responsive_offset="on" 
                                    
                                            data-frames='[{"delay":200,"speed":750,"sfxcolor":"#ddd","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                            {"delay":"wait","speed":500,"sfxcolor":"#ffffff","sfx_effect":"blocktoleft","frame":"999","to":"z:0;","ease":"Power4.easeOut"}]'
                                            data-textAlign="['left','left','center','center']"
                                            data-paddingtop="[20,20,20,20]"
                                            data-paddingright="[20,20,20,20]"
                                            data-paddingbottom="[30,30,30,30]"
                                            data-paddingleft="[20,20,20,20]"
                                    
                                            style="z-index: 8;  font-weight: 800; color: #ffffff; font-family: 'Teko', sans-serif;">Product Name <br /> One
                                        </div>                             

                                        <!-- LAYER NR. 5 -->
                                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-2" 
                                            id="slide-73-layer-5" 
                                            data-x="['center','center','center','center']" data-hoffset="['500','500','0','0']" 
                                            data-y="['middle','middle','bottom','bottom']" data-voffset="['0','0','50','50']" 
                                            data-width="none"
                                            data-height="none"
                                            data-whitespace="nowrap"
                                    
                                            data-type="image" 
                                            data-responsive_offset="on" 
                                    
                                            data-frames='[{"delay":400,"speed":750,"sfxcolor":"#000","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                            {"delay":"wait","speed":500,"sfxcolor":"#ffffff","sfx_effect":"blocktoleft","frame":"999","to":"z:0;","ease":"Power4.easeOut"}]'
                                            data-textAlign="['inherit','inherit','inherit','inherit']"
                                            data-paddingtop="[0,0,0,0]"
                                            data-paddingright="[0,0,0,0]"
                                            data-paddingbottom="[0,0,0,0]"
                                            data-paddingleft="[0,0,0,0]"
                                    
                                            style="z-index: 6;">
                                            <img src="{{asset('web/images/main-slider/slider10/slide1.jpg')}}" alt="" data-ww="['1000px','1000px','800px','500px']" data-hh="['480px','480px','450','281']" width="1200" height="675" data-no-retina>
                                        </div>
                                    

                                        </li>

                                        <!-- SLIDE 2 -->
                                        <li data-index="rs-74" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="Slide">

                                            <!-- MAIN IMAGE -->
                                            <img src="{{asset('web/images/main-slider/slider10/slide2-blur.jpg')}}" alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg">
                                            <!-- LAYERS -->
                                            
                                            <!-- LAYER 1 [ for overlay ] -->
                                            <div class="tp-caption tp-shape tp-shapewrapper " 
                                                id="slide-74-layer-1" 
                                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                                                data-width="full"
                                                data-height="full"
                                                data-whitespace="nowrap"
                                                data-type="shape" 
                                                data-basealign="slide" 
                                                data-responsive_offset="off" 
                                                data-responsive="off"
                                                data-frames='[
                                                {"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},
                                                {"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}
                                                ]'
                                                data-textAlign="['left','left','left','left']"
                                                data-paddingtop="[0,0,0,0]"
                                                data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]"
                                                data-paddingleft="[0,0,0,0]"
                                                
                                                style="z-index:2;background-color:rgba(0, 0, 0, 0.5);border-color:rgba(0, 0, 0, 0);border-width:0px;"> 
                                            </div>  

                                            <!-- LAYER NR. 2 -->
                                            <div class="tp-caption   tp-resizeme" 
                                                id="slide-74-layer-2" 
                                                data-x="['left','left','center','center']" data-hoffset="['0','0','0','0']" 
                                                data-y="['middle','middle','middle','middle']" data-voffset="['-150','-150','-200','-200']" 
                                                data-width="['650','650','620','380']"
                                                data-height="none"
                                                data-whitespace="normal"
                                        
                                                data-type="text" 
                                                data-responsive_offset="on" 
                                        
                                                data-frames='[{"delay":300,"speed":750,"sfxcolor":"#ddd","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                                {"delay":"wait","speed":500,"sfxcolor":"#ffffff","sfx_effect":"blocktoleft","frame":"999","to":"z:0;","ease":"Power4.easeOut"}]'
                                                data-textAlign="['left','left','center','center']"
                                                data-paddingtop="[10,10,10,10]"
                                                data-paddingright="[20,20,20,20]"
                                                data-paddingbottom="[10,10,10,10]"
                                                data-paddingleft="[20,20,20,20]"
                                        
                                                style="z-index: 7; font-size: 24px; line-height: 24px; font-weight: 600; color: #ffffff; letter-spacing: 4px;font-family: 'Teko', sans-serif;">High Performance</div>
                                        
                                            <!-- LAYER NR. 3 -->
                                            <div class="tp-caption   tp-resizeme" 
                                                id="slide-74-layer-3" 
                                                data-x="['left','left','center','center']" data-hoffset="['0','0','0','0']" 
                                                data-y="['middle','middle','middle','middle']" data-voffset="['0','0','-100','-120']" 
                                                data-fontsize="['100','100','60','40']"
                                                data-lineheight="['100','100','60','40']"
                                                data-width="['700','650','620','380']"
                                                data-height="none"
                                                data-whitespace="normal"
                                        
                                                data-type="text" 
                                                data-responsive_offset="on" 
                                        
                                                data-frames='[{"delay":200,"speed":750,"sfxcolor":"#ddd","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                                {"delay":"wait","speed":500,"sfxcolor":"#ffffff","sfx_effect":"blocktoleft","frame":"999","to":"z:0;","ease":"Power4.easeOut"}]'
                                                data-textAlign="['left','left','center','center']"
                                                data-paddingtop="[20,20,20,20]"
                                                data-paddingright="[20,20,20,20]"
                                                data-paddingbottom="[30,30,30,30]"
                                                data-paddingleft="[20,20,20,20]"
                                        
                                                style="z-index: 8;  font-weight: 800; color: #ffffff; font-family: 'Teko', sans-serif;">Product Name <br /> Two
                                            </div>                                        
                                                                        
                                            <!-- LAYER NR. 5 -->
                                            <div class="tp-caption   tp-resizeme rs-parallaxlevel-2" 
                                                id="slide-74-layer-5" 
                                                data-x="['center','center','center','center']" data-hoffset="['500','500','0','0']" 
                                                data-y="['middle','middle','bottom','bottom']" data-voffset="['0','0','50','50']" 
                                                data-width="none"
                                                data-height="none"
                                                data-whitespace="nowrap"
                                        
                                                data-type="image" 
                                                data-responsive_offset="on" 
                                        
                                                data-frames='[{"delay":400,"speed":750,"sfxcolor":"#000","sfx_effect":"blockfromleft","frame":"0","from":"z:0;","to":"o:1;","ease":"Power3.easeInOut"},
                                                {"delay":"wait","speed":500,"sfxcolor":"#ffffff","sfx_effect":"blocktoleft","frame":"999","to":"z:0;","ease":"Power4.easeOut"}]'
                                                data-textAlign="['inherit','inherit','inherit','inherit']"
                                                data-paddingtop="[0,0,0,0]"
                                                data-paddingright="[0,0,0,0]"
                                                data-paddingbottom="[0,0,0,0]"
                                                data-paddingleft="[0,0,0,0]"
                                        
                                                style="z-index: 6;">
                                                <img src="{{asset('web/images/main-slider/slider10/slide2.jpg')}}" alt="" data-ww="['1000px','1000px','800px','500px']" data-hh="['480px','480px','450','281']" width="1200" height="675" data-no-retina>
                                            </div>
                                        

                                        </li>                                        

                                    </ul>
                                    <div class="tp-bannertimer" style="height: 10px; background: rgba(0, 0, 0, 0.15);"></div>	
                                </div>

                            </div>
                    </div>
                    </div>
                </div>

            </div>
            <!-- SLIDER END --> 
           
            <!-- ABOUT ONE SECTION START -->
            <div class="section-full p-t80 p-b0 bg-no-repeat bg-center bg-white">
                <div class="about-section-three">
                    <div class="container">
                        <div class="section-content">                 
                            <div class="row justify-content-center d-flex">
                            
                                <div class="col-lg-6 col-md-12 m-b30">
                                    <!-- Accordian -->
                                    <div class="wt-accordion acc-bg-gray m-b50 about-section-three-acc" id="accordion">
                                        <div class="panel wt-panel">
                                            <div class="acod-head acc-actives" id="headingOne">
                                            <h5 class="acod-title">
                                                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Test & Measurement
                                                <span class="indicator"><i class="fa"></i></span>
                                                </a>
                                            </h5>
                                            </div>
                                        
                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                            <div class="acod-content p-tb15">
                                                We Are Proudly Providing Services Since 1995
                                                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed.
                                            </div>
                                            </div>
                                        </div>
                                        <div class="panel wt-panel">
                                            <div class="acod-head" id="headingTwo">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Calibration Services
                                                <span class="indicator"><i class="fa"></i></span>
                                                </a>
                                            </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <div class="acod-content p-tb15">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                            </div>
                                            </div>
                                        </div>
                                        <div class="panel wt-panel">
                                            <div class="acod-head" id="headingThree">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Instrumentation
                                                <span class="indicator"><i class="fa"></i></span>
                                                </a>
                                            </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                            <div class="acod-content p-tb15">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                            </div>
                                            </div>
                                        </div>
                                        <div class="panel wt-panel">
                                            <div class="acod-head" id="headingFour">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                Line & Substation Services
                                                <span class="indicator"><i class="fa"></i></span>
                                                </a>
                                            </h5>
                                            </div>
                                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                                <div class="acod-content p-tb15">
                                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div> 
                                                    
                                <div class="col-lg-6 col-md-12 m-b30">
                                    <div class="about-section-three-right">
                                        <!-- TITLE START-->
                                        <div class="left wt-small-separator-outer">
                                            <div class="wt-small-separator site-text-primary">
                                                <div  class="sep-leaf-left"></div>
                                                <div>About Industroz</div>
                                                <div  class="sep-leaf-right"></div>
                                            </div>
                                            <h2>We Provide top industrial Services.</h2>

                                        </div>                                    
                                        <!-- TITLE END-->

                                    
                                         <!-- Accordian -->
                                        <div class="">
                                            <p>
                                                HD Engineering an ISO 9001:2015 Certified Company was incorporated in 2018 to become the India's first organisation in North Eastern Region to Manufacture Test & Measurements products for energy sector. We owe our success to the confidence with which our customers approach us for the highest quality solutions.
                                            </p>
                                        </div>                                    

                                        <div class="ab-three-info d-flex justify-content-between">
                                            <div class="welcom-btn-position m-t20"><a href="about-1.html" class="site-button site-btn-effect">More About</a></div>
                                        </div>
                                                                    
                                    </div>
                                                                                    

                                </div>

                                
                        </div>
                    </div> 
                </div>
                </div>
            </div>   
            <!-- ABOUT ONE SECTION END -->    

            <!-- QUALITY SECTION START -->
            <div class="section-full p-b30 ">
                <div class="container">
                    <!-- TITLE START-->
                    <div class="section-head center wt-small-separator-outer text-center">
                        <div class="wt-small-separator site-text-primary">
                            <div  class="sep-leaf-left"></div>
                            <div>About Quality</div>
                            <div  class="sep-leaf-right"></div>
                        </div>
                        <h2>We're about Quality and Trust.</h2>
                    </div>
                    <!-- TITLE END-->
                </div>  
                            
                <div class="section-content quality-section-outer">
                    <div class="container">
                        <div class="quality-section-content">

                            <div class="counter-outer">
                                <div class="row justify-content-center">
                                            
                                    <div class="col-lg-3 col-md-6 col-sm-6 m-b30 ">
                                        <div class="wt-icon-box-wraper center bg-gray-light p-a20">
                                            <h2 class="counter site-text-primary m-b0">35</h2>
                                            <span class="site-text-secondry title-style-2">Projects Completed</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                                        <div class="wt-icon-box-wraper center bg-gray-light p-a20">
                                            <h2 class="counter site-text-primary  m-b0">1435</h2>
                                            <span class="site-text-secondry title-style-2">Work Employed</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                                        <div class="wt-icon-box-wraper center bg-gray-light p-a20">
                                            <h2 class="counter site-text-primary  m-b0" >750</h2>
                                            <span class="site-text-secondry title-style-2">Work facilities</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                                        <div class="wt-icon-box-wraper center bg-gray-light p-a20">
                                            <h2 class="counter site-text-primary  m-b0" >26</h2>
                                            <span class="site-text-secondry title-style-2">Winning Awards</span>
                                        </div>
                                    </div>                                        

                                </div>
                            </div>

                        </div>

                    </div>
                </div>      
            </div>   
            <!-- QUALITY SECTION END -->  
                                   
            <!-- CLIENT LOGO SECTION START -->
            <div class="section-full bg-gray p-tb20">
                <div class="container-fluid">
                    <div class="section-content">
                    
                        <!-- TESTIMONIAL 4 START ON BACKGROUND -->   
                        <div class="section-content">
                             <div class="section-content owl-btn-vertical-center">
                                <div class="owl-carousel home-client-carousel-2 ">
                                
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w1.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w2.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w3.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w4.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w5.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w6.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w1.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w2.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w3.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w4.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w5.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w6.png')}}" alt=""></a></div>
                                        </div>
                                    </div>  
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w1.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w2.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w3.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w4.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w5.png')}}" alt=""></a></div>
                                        </div>
                                    </div>
                                    
                                    <div class="item">
                                        <div class="ow-client-logo">
                                            <div class="client-logo client-logo-media">
                                            <a href="javascript:void(0);"><img src="{{asset('web/images/client-logo/w6.png')}}" alt=""></a></div>
                                        </div>
                                    </div>                                                                      
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CLIENT LOGO  SECTION End -->  
       
                          
        </div>
        <!-- CONTENT END -->

@endsection      
        
        