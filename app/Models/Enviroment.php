<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enviroment extends Model
{
    protected $table='enviroment';

    protected $fillable=['description'];
}
