<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Press extends Model
{
    protected $table='press';

    protected $fillable=['description'];
}
