<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Innovation extends Model
{
    protected $table='innovation';

    protected $fillable=['description'];
}
