<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeService extends Model
{
    protected $table='home_service';

    protected $fillable=['cat_id','sub_cat_id','image'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','cat_id','id');
    }
    
    public function subcategory()
    {
        return $this->belongsTo('App\Models\SubCategory','sub_cat_id','id');
    }
}
