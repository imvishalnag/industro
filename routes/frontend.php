<?php

// index

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\FrontEndController; 

// index
Route::get('/',[FrontEndController::class,'index'])->name('web.index');

// about
Route::get('/about',[FrontEndController::class,'about'])->name('web.about');

// Knowledge
Route::get('/knowledge/case_study',[FrontEndController::class,'blogs'])->name('web.case_study');
Route::get('/knowledge/case_study/{blog_id}',[FrontEndController::class,'blogDetail'])->name('web.case_study.detail');
Route::get('/knowledge/{slug}/{id}',[FrontEndController::class,'knowledge'])->name('web.knowledge');

// contact
Route::view('/contact','web.contact')->name('web.contact');
Route::post('add/contact',[FrontEndController::class,'addContact'])->name('web.add_contact');

Route::view('/feedback','web.feedback')->name('web.feedback');
Route::view('/queries','web.queries')->name('web.queries');
Route::view('/customer_contact','web.customer_contact')->name('web.customer_contact');

// contact
Route::post('add/product_inquery',[FrontEndController::class,'productInquery'])->name('web.product_inquery');

// product
Route::get('{catslug}/{slug}/{page_id}',[FrontEndController::class,'page'])->name('web.catagory.sub-catagory');