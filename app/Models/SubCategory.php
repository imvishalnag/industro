<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table='sub_categories';

    protected $fillable=['cat_id','name','status'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','cat_id','id');
    }

    public function pages()
    {
        return $this->hasMany('App\Models\Page','sub_cat_id','id')->where('status',1);
    }
}
