<?php

// index

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\FrontEndController; 

// index
Route::get('/',[FrontEndController::class,'index'])->name('web.index');

// about
Route::get('/about',[FrontEndController::class,'about'])->name('web.about');

// Knowledge
Route::get('/knowledge/{slug}/{id}',[FrontEndController::class,'knowledge'])->name('web.knowledge');

// contact
Route::view('/contact','web.contact')->name('web.contact');
Route::post('add/contact',[FrontEndController::class,'addContact'])->name('web.add_contact');

// product
Route::get('{catslug}/{slug}/{page_id}',[FrontEndController::class,'page'])->name('web.catagory.sub-catagory');