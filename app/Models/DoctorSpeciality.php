<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSpeciality extends Model
{
    protected $table='doctor_specialities';

    protected $fillable=['doctor_id','speciality_id'];

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor','doctor_id','id');
    }

    public function speciality()
    {
        return $this->belongsTo('App\Models\Speciality','speciality_id','id');
    }
}
