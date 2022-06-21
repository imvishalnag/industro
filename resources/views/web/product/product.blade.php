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
                            <h2 class="site-text-primary">{{$page->name}}</h2>
                        </div>
                    </div>
                    <!-- BREADCRUMB ROW -->                            
                    
                        <div>
                            <ul class="wt-breadcrumb breadcrumb-style-2">
                                <li><a href="{{route('web.index')}}">Home</a></li>
                                <li><a>{{$catslug}}</a></li>
                                <li>{{$slug}}</li>
                            </ul>
                        </div>
                    
                    <!-- BREADCRUMB ROW END -->                        
                </div>
            </div>
        </div>
        <!-- INNER PAGE BANNER END -->
        
        <!-- SECTION CONTENT START -->
        <div class="section-full p-t80 p-b80">
        
            <!-- PRODUCT DETAILS -->
            <div class="container woo-entry">
            
                <div class="row m-b30">
                    <div class="col-lg-3 col-md-4  m-b30">
                        <div class="wt-box wt-product-gallery on-show-slider"> 
                        
                            <div id="sync1" class="owl-carousel owl-theme owl-btn-vertical-center m-b5">
                                @foreach ($page->images as $item)                    
                                    <div class="item">
                                        <div class="mfp-gallery">
                                            <div class="wt-box">
                                                <div class="wt-thum-bx wt-img-overlay1 ">
                                                    <img src="{{asset('backend_images/'.$item->image.'')}}" alt="">
                                                    <div class="overlay-bx">
                                                        <div class="overlay-icon">
                                                            <a class="mfp-link" href="{{asset('backend_images/'.$item->image.'')}}">
                                                                <i class="fa fa-arrows-alt wt-icon-box-xs"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div id="sync2" class="owl-carousel owl-theme">
                                @foreach ($page->images as $item)                    
                                    <div class="item">
                                        <div class="wt-media">
                                            <img src="{{asset('backend_images/'.$item->image.'')}}" alt="">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-9 col-md-8">
                        <div class="product-detail-info bg-gray p-a30">
                            <div class="wt-product-title ">
                                <h2 class="post-title"><a href="javascript:void(0);">{{$page->name}}</a></h2>
                            </div>
                                    
                            <div class="wt-product-text">
                                <p>{{$page->short_description}}</p> 
                            </div>
                            <div class="cart clearfix d-flex">
                                @if(isset($page->catelog) && !empty($page->catelog))                                    
                                <button class="site-button-secondry m-r10 site-btn-effect m-b20" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$page}}">View Catalog</button>
                                @endisset
                                <a class="site-button site-btn-effect m-b20" href="tel:0361 6774480"><i class="fa fa-phone"></i> Call Us : 0361 6774480</a>
                            </div>
                            <div class="product_meta"> 
                                <span class="posted_in">
                                    <a href="#" rel="tag">{{$catslug}} ></a>
                                    <a href="#" rel="tag">{{$slug}}</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                    
                <!-- TABS CONTENT START -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="wt-tabs border bg-tabs">
                            <ul class="nav nav-tabs">
                                <li><a data-toggle="tab" href="#web-design-19" class="active">Description</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="web-design-19" class="tab-pane bg-gray active">
                                    <div class="site-list-style-two p-a10">
                                        {!!$page->description!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TABS CONTENT START -->
                
                                    


            </div>
            <!-- PRODUCT DETAILS -->    
                
        </div>
        <!-- CONTENT CONTENT END -->
        @if(isset($page->catelog) && !empty($page->catelog))
        <!-- MODAL CONTACT START -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enquring For</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <style>
                        .form-control{border: 1px solid #ced4da;}
                        .form-group {position: relative;}
                        .error{position: absolute;bottom: -25px;left: 0;color: red}
                    </style>
                    <form id="product-form">
                        <div id="alertone"></div>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">   
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="product-name" name="product" value="{{$page->name}}">
                                <input type="hidden" name="type" id="type" value="3">   
                                <input type="hidden" name="catelog" id="catelog" value="{{$page->catelog}}">   
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name" class="col-form-label">Name:</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                    <span id="name_err" class="error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone" class="col-form-label">Phone:</label>
                                    <input type="text" class="form-control" name="phone" id="phone">
                                    <span id="phone_err" class="error"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-form-label">Message:</label>
                                <textarea class="form-control" name="message" id="message"></textarea>
                                <span id="message_err" class="error"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="site-button site-btn-effect">Submit Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- MODAL CONTACT END -->  
        @endisset 

    </div>
    <!-- CONTENT END -->
@endsection  

@section('script')
<script>
    $(document).ready(function() {
    
      var sync1 = $("#sync1");
      var sync2 = $("#sync2");
      var slidesPerPage = 4; //globaly define number of elements per page
      var syncedSecondary = true;
    
          sync1.owlCarousel({
            items : 1,
            slideSpeed : 2000,
            nav: true,
            autoplay: false,
            dots: false,
            loop: true,
            responsiveRefreshRate : 200,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
          }).on('changed.owl.carousel', syncPosition);
    
          sync2
            .on('initialized.owl.carousel', function () {
              sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
            items : slidesPerPage,
            dots: false,
            nav: false,
            margin:5,
            smartSpeed: 200,
            slideSpeed : 500,
            slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
            responsiveRefreshRate : 100
          }).on('changed.owl.carousel', syncPosition2);
    
      function syncPosition(el) {
        //if you set loop to false, you have to restore this next line
        //var current = el.item.index;
        
        //if you disable loop you have to comment this block
        var count = el.item.count-1;
        var current = Math.round(el.item.index - (el.item.count/2) - .5);
        
        if(current < 0) {
          current = count;
        }
        if(current > count) {
          current = 0;
        }
        
        //end block
    
        sync2
          .find(".owl-item")
          .removeClass("current")
          .eq(current)
          .addClass("current");
        var onscreen = sync2.find('.owl-item.active').length - 1;
        var start = sync2.find('.owl-item.active').first().index();
        var end = sync2.find('.owl-item.active').last().index();
        
        if (current > end) {
          sync2.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
          sync2.data('owl.carousel').to(current - onscreen, 100, true);
        }
      }
      
      function syncPosition2(el) {
        if(syncedSecondary) {
          var number = el.item.index;
          sync1.data('owl.carousel').to(number, 100, true);
        }
      }
      
      sync2.on("click", ".owl-item", function(e){
        e.preventDefault();
        var number = $(this).index();
        sync1.data('owl.carousel').to(number, 300, true);
      });
    });

    // Modal
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Enquring For ' + recipient.name)
        // modal.find('#recipient-name').val(recipient.name)
        $('#product-name').attr('readonly','readonly')
        $('#product-name').css('cursor','no-drop')
    });

    @if(isset($page->catelog) && !empty($page->catelog))
    $('#product-form').on('click', function(e){
        e.preventDefault();
        product = $('#product-name').val();
        name = $('#name').val();
        phone = $('#phone').val();
        message = $('#message').val();
        type = $('#type').val();
        asset = $('#catelog').val();
                
        if(!name || !phone || !message){
            if(!name){
                $('#name_err').html('').show();
                $('#name_err').html('Please Enter Your Name');
            }
            
            if(!phone){
                $('#phone_err').html('').show();
                $('#phone_err').html('Please Enter Phone');
            
            }

            if(!message){
                $('#message_err').html('').show();
                $('#message_err').html('Please Enter Message');
            }
        }else{       
            var data = $(this).serializeArray();
            const URL = "{{asset('backend_images')}}/"+ asset;
            
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            });
            $.ajax({
                url: "{{route('web.form_inquery_send')}}",
                method: "POST",
                data: data,
                success: function(response){
                    console.log('here',response);
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
                        window.open(URL, '_blank');
                        $('#product-form')[0].reset();
                    }
                    if(response.error){
                        html = '<div class="alert alert-danger">' + response.error + '</div>';
                    }
                    $("#alertone").html(html);
                },
                error: function(xhr, textStatus, thrownError) {
                    console.log(' Error',xhr);
                }
            });
        }

    });    
    @endisset
</script>    
@endsection