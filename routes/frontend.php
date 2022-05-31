<?php

// index

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\FrontEndController; 

// index
Route::get('/',[FrontEndController::class,'index'])->name('web.index');

// about
Route::view('/about','web.about')->name('web.about');

// contact
Route::view('/contact','web.contact')->name('web.contact');

// product
Route::get('{catslug}/{slug}/{page_id}',[FrontEndController::class,'page'])->name('web.catagory.sub-catagory');