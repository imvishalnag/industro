<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorReview extends Model
{
   protected $table='doctor_reviews';

   protected $fillable=['doctor_id','title','image','desc'];

   public function doctor()
   {
       return $this->belongsTo('App\Models\Doctor','doctor_id','id');
   }
}
