<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chairmen extends Model
{
    protected $table='chairmen';

    protected $fillable=['description','image','title'];
}
