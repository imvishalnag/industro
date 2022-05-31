<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table='doctors';

    protected $fillable=['name','degree','experience','doctor_bio','has_review','photo','consultation_fee','location','cktwo','has_consultaion_fee','has_location'];

    public function speciality()
    {
        return $this->hasMany('App\Models\DoctorSpeciality','doctor_id','id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\DoctorReview','doctor_id','id');
    }
}
