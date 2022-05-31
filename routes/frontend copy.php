<?php

// index

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\FrontEndController; 

Route::get('/',[FrontEndController::class,'index'])->name('web.index');

// index
// Route::view('/sub-catagory','web.catagory.sub-catagory')->name('web.catagory.sub-catagory');

Route::get('{catslug}/{cat_id}',[FrontEndController::class,'catpage'])->name('web.catagory.catagory');
Route::get('{catslug}/{slug}/{sub_cat_id}',[FrontEndController::class,'page'])->name('web.catagory.sub-catagory');
Route::post('add/appointment',[FrontEndController::class,'addAppointment'])->name('web.add_appointment');
Route::post('doctor/add/appointment',[FrontEndController::class,'bookDoctor'])->name('web.book_doctor');
Route::post('add/random/info',[FrontEndController::class,'addRandomInfo'])->name('web.add_random');
Route::get('press/release',[FrontEndController::class,'pressRelease'])->name('web.press-release.press-release');
Route::get('blog',[FrontEndController::class,'blogs'])->name('web.blog.blog');
Route::get('review',[FrontEndController::class,'review'])->name('web.review.review');
Route::post('add/contact',[FrontEndController::class,'addContact'])->name('web.add_contact');
Route::post('add/register',[FrontEndController::class,'addRegister'])->name('web.add_register');
Route::get('/blog-detail{blog_id}',[FrontEndController::class,'blogDetail'])->name('web.blog.blog-detail');
Route::get('/press-detail/{press_id}',[FrontEndController::class,'pressDetail'])->name('web.press-release.press-detail');

Route::get('/doctor',[FrontEndController::class,'doctors'])->name('web.doctor.doctor');
Route::get('search/{speciality_id}',[FrontEndController::class,'search'])->name('web.doctor.search');
Route::get('/doctor-detail/{doctor_id}',[FrontEndController::class,'doctorDetails'])->name('web.doctor.doctor-detail');

// blog
// Route::view('/blog','web.blog.blog')->name('web.blog.blog');

// blog-detail
// Route::view('/blog-detail','web.blog.blog-detail')->name('web.blog.blog-detail');

// press-release
// Route::view('/press-release','web.press-release.press-release')->name('web.press-release.press-release');

// press-detail
// Route::view('/press-detail','web.press-release.press-detail')->name('web.press-release.press-detail');

// contact
Route::view('/contact','web.contact.contact')->name('web.contact.contact');

// why_we_are
Route::get('why_we_are',[FrontEndController::class,'why'])->name('web.about.why');

// about
Route::get('about',[FrontEndController::class,'about'])->name('web.about.about');

// history
Route::get('history',[FrontEndController::class,'history'])->name('web.about.history');

// managment
Route::get('managment',[FrontEndController::class,'management'])->name('web.about.managment');

// hse
Route::get('hse',[FrontEndController::class,'hse'])->name('web.about.hse');

// innovation
Route::get('innovation',[FrontEndController::class,'innovation'])->name('web.about.innovation');

// Idea
Route::get('idea',[FrontEndController::class,'idea'])->name('web.about.idea');

// Product
Route::get('product',[FrontEndController::class,'product'])->name('web.about.product');

// Service
Route::get('service',[FrontEndController::class,'service'])->name('web.about.service');

// media
Route::get('media',[FrontEndController::class,'media'])->name('web.about.media');

// what
Route::get('what',[FrontEndController::class,'what'])->name('web.about.what');

// press
Route::get('press',[FrontEndController::class,'press'])->name('web.about.press');

// video
Route::get('video',[FrontEndController::class,'video'])->name('web.about.video');

// social
Route::get('social',[FrontEndController::class,'social'])->name('web.about.social');

// export
Route::get('export',[FrontEndController::class,'export'])->name('web.about.export');

// west
Route::get('west',[FrontEndController::class,'west'])->name('web.about.west');

// east
Route::get('east',[FrontEndController::class,'east'])->name('web.about.east');

// career
Route::get('career',[FrontEndController::class,'career'])->name('web.about.career');

// investor
Route::get('investor',[FrontEndController::class,'investor'])->name('web.about.investor');

// partner
Route::get('partner',[FrontEndController::class,'partner'])->name('web.about.partner');

// employee
Route::get('employee',[FrontEndController::class,'employee'])->name('web.about.employee');

// csr
Route::get('csr',[FrontEndController::class,'csr'])->name('web.about.csr');

// health
Route::get('health',[FrontEndController::class,'health'])->name('web.about.health');

// safety
Route::get('safety',[FrontEndController::class,'safety'])->name('web.about.safety');

// enviroment
Route::get('enviroment',[FrontEndController::class,'enviroment'])->name('web.about.enviroment');

// activities
Route::get('activities',[FrontEndController::class,'activities'])->name('web.about.activities');

// TC
Route::view('/terms&condition','web.tc')->name('web.tc');

// privacy
Route::view('/privacy','web.privacy')->name('web.privacy');

// register
Route::view('/register','web.register')->name('web.register');


