<?php
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\DoctorAppointmentController;
use App\Http\Controllers\Admin\DistributorController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\PressReleaseController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\HseController;
use App\Http\Controllers\Admin\InnovationController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\CsrController;
use App\Http\Controllers\Admin\WhyController;
use App\Http\Controllers\Admin\IntroController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Admin'],function(){
    Route::get('/admin/login',[LoginController::class,'index'])->name('admin.login_form');    
    Route::post('login', [LoginController::class,'adminLogin']);
   

    Route::group(['middleware'=>'auth:admin','prefix'=>'admin'],function(){
        Route::get('/dashboard', [DashboardController::class,'dashboardView'])->name('admin.deshboard'); 
        Route::post('logout', [LoginController::class,'logout'])->name('admin.logout');
        Route::get('/change/password/form', [DashboardController::class,'changePasswordForm'])->name('admin.change_password_form');
        Route::post('/change/password', [DashboardController::class,'changePassword'])->name('admin.change_password');
        
        Route::group(['prefix'=>'category'],function(){
            Route::get('list',[CategoryController::class,'categoryList'])->name('admin.category.list');
            Route::get('list/ajax',[CategoryController::class,'categoryListAjax'])->name('admin.category.list_ajax');
            Route::get('add/form',[CategoryController::class,'addCategoryForm'])->name('admin.category.add_form');
            Route::post('insert',[CategoryController::class,'addCategory'])->name('admin.category.insert');
            Route::get('edit/form/{category_id}',[CategoryController::class,'editCategoryForm'])->name('admin.category.edit_form');
            Route::put('update/{category_id}',[CategoryController::class,'updateCategory'])->name('admin.category.update');
            Route::get('status/{category_id}/{status}',[CategoryController::class,'status'])->name('admin.category.status');
        });

        Route::group(['prefix'=>'subcategory'],function(){
            Route::get('list',[SubCategoryController::class,'subCategoryList'])->name('admin.subcategory.list');
            Route::get('list/ajax',[SubCategoryController::class,'subCategoryListAjax'])->name('admin.subcategory.list_ajax');
            Route::get('add/form',[SubCategoryController::class,'addSubCategoryForm'])->name('admin.subcategory.add_form');
            Route::post('insert',[SubCategoryController::class,'addSubCategory'])->name('admin.subcategory.insert');
            Route::get('edit/form/{sub_cat_id}',[SubCategoryController::class,'editSubCategoryForm'])->name('admin.subcategory.edit_form');
            Route::put('update/{sub_cat_id}',[SubCategoryController::class,'updateSubCategory'])->name('admin.subcategory.update');
            Route::get('status/{sub_cat_id}/{status}',[SubCategoryController::class,'status'])->name('admin.subcategory.status');
        });

        Route::group(['prefix'=>'city'],function(){
            Route::get('list',[CityController::class,'cityList'])->name('admin.city.list');
            Route::get('list/ajax',[CityController::class,'cityListAjax'])->name('admin.city.list_ajax');
            Route::get('add/form',[CityController::class,'addCityForm'])->name('admin.city.add_form');
            Route::post('insert',[CityController::class,'addCity'])->name('admin.city.insert');
            Route::get('edit/form/{city_id}',[CityController::class,'editCityForm'])->name('admin.city.edit_form');
            Route::put('update/{city_id}',[CityController::class,'updateCity'])->name('admin.city.update');
            Route::get('status/{city_id}/{status}',[CityController::class,'status'])->name('admin.city.status');
        });

        Route::group(['prefix'=>'speciality'],function(){
            Route::get('list',[SpecialityController::class,'index'])->name('admin.speciality.list');
            Route::get('add/form',[SpecialityController::class,'create'])->name('admin.speciality.create');
            Route::post('insert',[SpecialityController::class,'store'])->name('admin.speciality.insert');
            Route::get('edit/form/{speciality_id}',[SpecialityController::class,'edit'])->name('admin.speciality.edit');
            Route::put('update/{speciality_id}',[SpecialityController::class,'update'])->name('admin.speciality.update');
            Route::get('status/{speciality_id}',[SpecialityController::class,'status'])->name('admin.speciality.status');
        });

        Route::group(['prefix'=>'doctor'],function(){
            Route::get('list',[DoctorController::class,'index'])->name('admin.doctor.list');
            Route::get('list/ajax',[DoctorController::class,'listAjax'])->name('admin.doctor.list_ajax');
            Route::get('add/form',[DoctorController::class,'create'])->name('admin.doctor.create');
            Route::post('insert',[DoctorController::class,'store'])->name('admin.doctor.insert');
            Route::get('edit/form/{doctor_id}',[DoctorController::class,'edit'])->name('admin.doctor.edit');
            Route::put('update/{doctor_id}',[DoctorController::class,'update'])->name('admin.doctor.update');
            Route::get('status/{doctor_id}',[DoctorController::class,'status'])->name('admin.doctor.status');
            Route::get('remove/speciality/{speciality_id}/{doctor_id}',[DoctorController::class,'removeSpeciality'])->name('admin.doctor.removespeciality');
            Route::get('ediot/review/{doctor_id}',[DoctorController::class,'editReview'])->name('admin.doctor.edit_review');
            Route::get('remove/review/{review_id}',[DoctorController::class,'removeReview'])->name('admin.doctor.remove_review');
            Route::post('update/review/',[DoctorController::class,'updateReview'])->name('admin.doctor.update_review');
            Route::post('add/new/review/',[DoctorController::class,'addReview'])->name('admin.doctor.add_review');
            Route::get('status/review/{doctor_id}',[DoctorController::class,'reviewStatus'])->name('admin.doctor.review_status');
            Route::get('view/details/{doctor_id}',[DoctorController::class,'viewDetails'])->name('admin.doctor.view_details');


        });

        Route::group(['prefix'=>'appointment'],function(){
            Route::get('list',[InquiryController::class,'appointmentList'])->name('admin.appointment.list');
            Route::get('list/ajax',[InquiryController::class,'appointmentListAjax'])->name('admin.appointment.list_ajax');
            Route::get('delete/{appointment_id}',[InquiryController::class,'deleteAppointment'])->name('admin.appointment.delete');
            Route::get('view/{appointment_id}',[InquiryController::class,'view'])->name('admin.appointment.view');

        });

        Route::group(['prefix'=>'review'],function(){
            Route::get('list',[ReviewController::class,'reviewList'])->name('admin.review.list');
            Route::get('list/ajax',[ReviewController::class,'reviewListAjax'])->name('admin.review.list_ajax');
            Route::get('add/form',[ReviewController::class,'addReviewForm'])->name('admin.review.add_form');
            Route::post('insert',[ReviewController::class,'insertReview'])->name('admin.review.insert');
            Route::get('delete/{review_id}',[ReviewController::class,'deleteReview'])->name('admin.review.delete');
            Route::get('status/{review_id}/{status}',[ReviewController::class,'status'])->name('admin.review.status');
            Route::get('edit/form/{review_id}',[ReviewController::class,'editReviewForm'])->name('admin.review.edit_form');
            Route::put('update/{review_id}',[ReviewController::class,'updateReview'])->name('admin.review.update');
            Route::get('view/{review_id}',[ReviewController::class,'view'])->name('admin.review.view');
        });

        Route::group(['prefix'=>'pages'],function(){
            Route::get('list',[PageController::class,'pageList'])->name('admin.pages.list');
            Route::get('list/ajax',[PageController::class,'pageListAjax'])->name('admin.pages.list_ajax');
            Route::get('add/form',[PageController::class,'addPageForm'])->name('admin.pages.add_form');
            Route::get('find/sub/category/{cat_id}',[PageController::class,'findSubCategory'])->name('admin.find.sub_category');
            Route::post('insert',[PageController::class,'insertPage'])->name('admin.insert_page');
            Route::get('publish/status/{page_id}/{status}',[PageController::class,'publishStatus'])->name('admin.publish_status');

            
            Route::group(['prefix' => 'image', 'as' => 'admin.image.'],function(){
                Route::get('/list/{page_id}',[PageController::class,'imageList'])->name('list');
                Route::get('/make/thumb/{image_id}',[PageController::class,'imageMakeThumb'])->name('make_thumb');
                Route::get('/make/delete/{image_id}',[PageController::class,'imageDelete'])->name('delete');
                Route::post('/add',[PageController::class,'imageAddMore'])->name('add');
            });
            
            Route::get('edit/form/{page_id}',[PageController::class,'editPageForm'])->name('admin.edit_page_form');
            Route::put('update/{page_id}',[PageController::class,'updatePage'])->name('admin.update_page');

            // Causes Section Operations 
            Route::get('edit/causes/form/{page_id}',[PageController::class,'editCausesForm'])->name('admin.edit_causes_form');
            Route::post('add/causes/',[PageController::class,'addCause'])->name('admin.add_causes');
            Route::post('update/causes/',[PageController::class,'updateCause'])->name('admin.update_causes');
            Route::get('delete/causes/{causes_id}',[PageController::class,'deleteCause'])->name('admin.delete_causes');
            Route::get('causes/status/{page_id}/{status}',[PageController::class,'causesStatus'])->name('admin.causes.status');
            
            // Symtomps Section Operations
            Route::get('edit/symptomp/form/{page_id}',[PageController::class,'editSymptompForm'])->name('admin.edit_symptomp_form');
            Route::post('add/symptomp/',[PageController::class,'addNewSymptomps'])->name('admin.add_new_symptomp');
            Route::post('update/symptomp/',[PageController::class,'updateSymptomps'])->name('admin.update_symptomp');
            Route::get('delete/symptomp/{symp_id}',[PageController::class,'deleteSymptomp'])->name('admin.delete_symptomp');
            Route::get('symptomp/status/{page_id}/{status}',[PageController::class,'sympStatus'])->name('admin.symptomp.status');

            //FAQ Section Operations
            Route::get('edit/faq/form/{page_id}',[PageController::class,'editFaqForm'])->name('admin.edit_faq_form');
            Route::post('add/faq/',[PageController::class,'addNewFaq'])->name('admin.add_new_faq');
            Route::post('update/faq/',[PageController::class,'updatefaq'])->name('admin.update_faq');
            Route::get('delete/faq/{faq_id}',[PageController::class,'deleteFaq'])->name('admin.delete_faq');
            Route::get('faq/status/{page_id}/{status}',[PageController::class,'faqStatus'])->name('admin.faq.status');


            //Overview Section Operations
            Route::get('edit/overview/form/{page_id}',[PageController::class,'editOverviewForm'])->name('admin.edit_overview_form');
            Route::post('add/overview/',[PageController::class,'addNewOverview'])->name('admin.add_new_overview');
            Route::post('update/overview/',[PageController::class,'updateOverview'])->name('admin.update_overview');
            Route::get('delete/overview/{overview_id}',[PageController::class,'deleteOverview'])->name('admin.delete_overview');
            Route::get('overview/status/{page_id}/{status}',[PageController::class,'overviewStatus'])->name('admin.overview.status');

            Route::get('check/sub/category/{sub_cat_id}',[PageController::class,'checkSubCategory'])->name('admin.check_subcategory');
            Route::get('sub/category/check/{sub_cat_id}/{page_id}',[PageController::class,'checkSubCategoryUpdate'])->name('admin.sub_category_check');
            
            Route::group(['prefix'=>'pages'],function(){
                Route::get('/blog', [BlogsController::class,'index'])->name('admin.blog');
                Route::post('/store/blog', [BlogsController::class,'store'])->name('admin.store_blog');
                Route::get('/blog/list', [BlogsController::class,'list'])->name('admin.blog_list');
                Route::get('/posts/list', [BlogsController::class,'show'])->name('admin.ajax.show_post');
                Route::get('/get/post/{id}',[BlogsController::class,'singlePost'])->name('admin.post_view');
                Route::get('/edit/post/{id}',[BlogsController::class,'editPost'])->name('admin.post_edit');
                Route::post('/update/post',[BlogsController::class,'updatePost'])->name('admin.update_post');
                Route::get('/delete/post/{id}',[BlogsController::class,'deletePost'])->name('admin.post_delete');
                Route::get('/status/post/{id}/{status}',[BlogsController::class,'statusPost'])->name('admin.post_status');                 
                
                Route::post('ck-editor-image-upload',[BlogsController::class,'ckEditorImageUpload'])->name('admin.ck_editor_image_upload'); 
            });
            
            Route::group(['prefix'=>'pressrelease'],function(){
                Route::get('list',[PressReleaseController::class,'list'])->name('admin.pressrelease.list');
                Route::get('add/form',[PressReleaseController::class,'addForm'])->name('admin.pressrelease.add_form');
                Route::post('insert',[PressReleaseController::class,'insert'])->name('admin.pressrelease.insert');
                Route::get('delete/{press_id}',[PressReleaseController::class,'delete'])->name('admin.pressrelease.delete');
                Route::get('view/{press_id}',[PressReleaseController::class,'view'])->name('admin.pressrelease.view');
            });

            Route::group(['prefix'=>'contact'],function(){
                Route::get('list',[InquiryController::class,'contactList'])->name('admin.contact.list');
                Route::get('delete/{contact_id}',[InquiryController::class,'deleteContact'])->name('admin.contact.delete');
            });
            
            Route::group(['prefix'=>'user'],function(){
                Route::get('list',[InquiryController::class,'UserList'])->name('admin.contact.user_list');
                Route::get('delete/{user_id}',[InquiryController::class,'deleteUser'])->name('admin.user.delete');
            });

            Route::group(['prefix'=>'doctorappointment'],function(){
                Route::get('doctor/list',[DoctorAppointmentController::class,'index'])->name('admin.doctorappointment.list');
                Route::get('doctor/list/ajax',[DoctorAppointmentController::class,'listAjax'])->name('admin.doctorappointment.list_ajax');
                Route::get('delete/doctor/{appointment_id}',[DoctorAppointmentController::class,'deleteAppointment'])->name('admin.doctorappointment.delete');
                Route::get('random/list',[DoctorAppointmentController::class,'randomList'])->name('admin.random.list');
                Route::get('random/list/ajax',[DoctorAppointmentController::class,'randomListAjax'])->name('admin.random.random_list_ajax');
                Route::get('random/delete/{random_id}',[DoctorAppointmentController::class,'deleteRandom'])->name('admin.random.delete_random');
            });

        });

        Route::group(['prefix' => 'client', 'as' => 'admin.client.'],function(){
            Route::get('/list',[ClientController::class,'imageList'])->name('list');
            Route::get('/make/delete/{image_id}',[ClientController::class,'imageDelete'])->name('delete');
            Route::post('/add',[ClientController::class,'imageAddMore'])->name('add');
        });        

        Route::group(['prefix'=>'distributor' , 'as' => 'admin.distributor.'],function(){
            Route::get('list',[DistributorController::class,'distributorList'])->name('list');
            Route::get('/delete/{distributor_id}',[DistributorController::class,'distributorDelete'])->name('delete');
            Route::get('add/form',[DistributorController::class,'addDistributor'])->name('add_form');
            Route::post('insert',[DistributorController::class,'insertDistributor'])->name('insert');
        });

        // about        
        Route::get('/about/view/',[AboutController::class,'singlePost'])->name('admin.about_view');
        Route::post('/about/edit/',[AboutController::class,'updatePost'])->name('admin.about_edit');
            
        // other pages
        Route::view('/additional-page', 'admin.about.list')->name('admin.about.list');

        // why_we_are
        Route::view('/why_we_are/list/', 'admin.about.why-list')->name('admin.about.why-list');
        Route::get('/why_we_are/view/',[WhyController::class,'singlePost'])->name('admin.why_view');
        Route::post('/why_we_are/edit/',[WhyController::class,'updatePost'])->name('admin.why_edit');
        Route::get('/history/view/',[HistoryController::class,'singlePost'])->name('admin.history_view');
        Route::post('/history/edit/',[HistoryController::class,'updatePost'])->name('admin.history_edit');
        Route::get('/management/view/',[ManagementController::class,'singlePost'])->name('admin.management_view');
        Route::post('/management/edit/',[ManagementController::class,'updatePost'])->name('admin.management_edit');
        Route::get('/hsc/view/',[HseController::class,'singlePost'])->name('admin.hse_view');
        Route::post('/hsc/edit/',[HseController::class,'updatePost'])->name('admin.hse_edit');

        // innovation
        Route::view('/innovation/list/', 'admin.about.innovation-list')->name('admin.about.innovation-list');
        Route::get('/innovation/view/',[InnovationController::class,'singlePost'])->name('admin.innovation_view');
        Route::post('/innovation/edit/',[InnovationController::class,'updatePost'])->name('admin.innovation_edit');
        Route::get('/idea/view/',[InnovationController::class,'ideasinglePost'])->name('admin.idea_view');
        Route::post('/idea/edit/',[InnovationController::class,'ideaupdatePost'])->name('admin.idea_edit');
        Route::get('/product/view/',[InnovationController::class,'productsinglePost'])->name('admin.product_view');
        Route::post('/product/edit/',[InnovationController::class,'productupdatePost'])->name('admin.product_edit');
        Route::get('/service/view/',[InnovationController::class,'servicesinglePost'])->name('admin.service_view');
        Route::post('/service/edit/',[InnovationController::class,'serviceupdatePost'])->name('admin.service_edit');

        // media
        Route::view('/media/list/', 'admin.about.media-list')->name('admin.about.media-list');
        Route::get('/media/view/',[MediaController::class,'singlePost'])->name('admin.media_view');
        Route::post('/media/edit/',[MediaController::class,'updatePost'])->name('admin.media_edit');
        Route::post('/csr/edit/',[MediaController::class,'updatePost'])->name('admin.csr_edit');
        Route::get('/whats_new/view/',[MediaController::class,'whatsinglePost'])->name('admin.what_view');
        Route::post('/whats_new/edit/',[MediaController::class,'whatupdatePost'])->name('admin.what_edit');
        Route::get('/social_media/view/',[MediaController::class,'socialsinglePost'])->name('admin.social_view');
        Route::post('/social_media/edit/',[MediaController::class,'socialupdatePost'])->name('admin.social_edit');
        Route::get('/video/view/',[MediaController::class,'videosinglePost'])->name('admin.video_view');
        Route::post('/video/edit/',[MediaController::class,'videoupdatePost'])->name('admin.video_edit');
        Route::get('/press/view/',[MediaController::class,'presssinglePost'])->name('admin.press_view');
        Route::post('/press/edit/',[MediaController::class,'pressupdatePost'])->name('admin.press_edit');

        // csr
        Route::view('/csr/list/', 'admin.about.csr-list')->name('admin.about.csr-list');
        Route::get('/csr/view/',[CsrController::class,'singlePost'])->name('admin.csr_view');
        Route::post('/csr/edit/',[CsrController::class,'updatePost'])->name('admin.csr_edit');
        Route::get('/health/view/',[CsrController::class,'healthsinglePost'])->name('admin.health_view');
        Route::post('/health/edit/',[CsrController::class,'healthupdatePost'])->name('admin.health_edit');
        Route::get('/safety/view/',[CsrController::class,'safetysinglePost'])->name('admin.safety_view');
        Route::post('/safety/edit/',[CsrController::class,'safetyupdatePost'])->name('admin.safety_edit');
        Route::get('/enviroment/view/',[CsrController::class,'enviromentsinglePost'])->name('admin.enviroment_view');
        Route::post('/enviroment/edit/',[CsrController::class,'enviromentupdatePost'])->name('admin.enviroment_edit');
        Route::get('/activities/view/',[CsrController::class,'activitiessinglePost'])->name('admin.activities_view');
        Route::post('/activities/edit/',[CsrController::class,'activitiesupdatePost'])->name('admin.activities_edit');
        
        // career
        Route::view('/career/list/', 'admin.about.career-list')->name('admin.about.career-list');
        Route::get('/career/view/',[CareerController::class,'singlePost'])->name('admin.career_view');
        Route::post('/career/edit/',[CareerController::class,'updatePost'])->name('admin.career_edit');
        Route::get('/investor/view/',[CareerController::class,'investorsinglePost'])->name('admin.investor_view');
        Route::post('/investor/edit/',[CareerController::class,'investorupdatePost'])->name('admin.investor_edit');
        Route::get('/partner/view/',[CareerController::class,'partnersinglePost'])->name('admin.partner_view');
        Route::post('/partner/edit/',[CareerController::class,'partnerupdatePost'])->name('admin.partner_edit');
        Route::get('/employee/view/',[CareerController::class,'employeesinglePost'])->name('admin.employee_view');
        Route::post('/employee/edit/',[CareerController::class,'employeeupdatePost'])->name('admin.employee_edit');
        
        // export
        Route::view('/export/list/', 'admin.about.export-list')->name('admin.about.export-list');
        Route::get('/export/view/',[ExportController::class,'singlePost'])->name('admin.export_view');
        Route::post('/export/edit/',[ExportController::class,'updatePost'])->name('admin.export_edit');
        Route::get('/east/view/',[ExportController::class,'eastsinglePost'])->name('admin.east_view');
        Route::post('/east/edit/',[ExportController::class,'eastupdatePost'])->name('admin.east_edit');
        Route::get('/west/view/',[ExportController::class,'westsinglePost'])->name('admin.west_view');
        Route::post('/west/edit/',[ExportController::class,'westupdatePost'])->name('admin.west_edit');

        // Index        
        Route::get('/intro/view/',[IntroController::class,'singlePost'])->name('admin.intro_view');
        Route::post('/intro/edit/',[IntroController::class,'updatePost'])->name('admin.intro_edit');
        Route::get('/chairmen/view/',[IntroController::class,'chairmenView'])->name('admin.chairmen_view');
        Route::post('/chairmen/edit/',[IntroController::class,'chairmenEdit'])->name('admin.chairmen_edit');
        
        Route::get('/slider/list',[SliderController::class,'webSliderList'])->name('admin.webSliderList');
        Route::get('/slider/add/form', [SliderController::class,'webSliderAddForm'])->name('admin.web_slider_add_form');
        Route::post('/slider/insert/form', [SliderController::class,'insertWebSlider'])->name('admin.insert_web_slider');
        Route::get('/delete/slider/{id}',[SliderController::class,'deletePost'])->name('admin.slider_delete');

        Route::get('/banner/view/',[BannerController::class,'bannerView'])->name('admin.banner_view');
        Route::post('/banner/edit/',[BannerController::class,'bannerEdit'])->name('admin.banner_edit');

        Route::get('/service/list',[ServiceController::class,'webServiceList'])->name('admin.webServiceList');
        Route::get('/service/add/form', [ServiceController::class,'webServiceAddForm'])->name('admin.web_service_add_form');        
        Route::post('/service/insert/form', [ServiceController::class,'insertWebService'])->name('admin.insert_web_service');
        Route::get('/service/form/edit/{id}',[ServiceController::class,'webServiceEdit'])->name('admin.service_edit_form');
        Route::put('/service/update/{id}',[ServiceController::class,'webServiceUpdate'])->name('admin.service_update');
    });
});

