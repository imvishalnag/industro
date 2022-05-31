<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
  protected $table='appointments';

  protected $fillable=['name','email','city_id','sub_cat_id'];

  public function cities()
  {
    return $this->belongsTo('App\Models\City','city_id','id');
  }

  public function sub_categories()
  {
      return $this->belongsTo('App\Models\SubCategory','sub_cat_id','id');
  }
}
