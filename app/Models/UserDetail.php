<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table='user_detail';

    protected $fillable=['name','email','phone','social_media','product','subject','message'];
}