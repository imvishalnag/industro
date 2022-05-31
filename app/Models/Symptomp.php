<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Symptomp extends Model
{
    protected $table='symptomps';

    protected $fillable=['page_id','image','name'];
}
