<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table='pages';

    protected $fillable=['cat_id','sub_cat_id','name','short_description','description','status'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','cat_id','id');
    }
    
    public function subcategory()
    {
        return $this->belongsTo('App\Models\SubCategory','sub_cat_id','id');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class,'pages_id','id');
    }
    
}
