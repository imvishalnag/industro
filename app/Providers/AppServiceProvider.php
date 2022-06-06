<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\City;
use App\Models\Distributor;
use App\Models\Page;
use App\Models\Knowledge;
use App\Models\SubCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['web.include.header','web.include.footer'], function($view){
            // $header_data =null;
            $category = Category::with('subcategory')->withCount('subcategory')->get()->map(function($category){
                $category->subcategory->map(function($subcategory){
                    $subcategory->page_count = $subcategory->pages->count();
                });
                return $category;
            });
            $distributor = Distributor::orderBy('id')->get();
            $knowledge = Knowledge::orderBy('id')->get();
            
            $header_data =['category'=>$category,'distributor'=>$distributor,'knowledge'=>$knowledge];
            $view->with('header_data',$header_data);
         });
    }
}
