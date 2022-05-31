<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    protected $table='causes';

    protected $fillable=['page_id','image','name'];
}
