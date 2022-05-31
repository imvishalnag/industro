<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    protected $table='intro';

    protected $fillable=['description','service_one','service_one_image','service_one_description','service_two','service_two_image','service_two_description','service_three','service_three_image','service_three_description'];
}
