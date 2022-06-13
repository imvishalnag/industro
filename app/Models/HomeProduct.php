<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeProduct extends Model
{
    protected $table='home_product';

    protected $fillable=['sub_cat_id','product_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','cat_id','id');
    }
    
    public function subcategory()
    {
        return $this->belongsTo('App\Models\SubCategory','sub_cat_id','id');
    }
    
    public function page()
    {
        return $this->belongsTo('App\Models\Page','product_id','id');
    }
}
