<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorAppointment extends Model
{
    protected $table='doctor_appointments';

    protected $fillable=['doctor_id','name','phone','date','about'];

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor','doctor_id','id');
    }
}
