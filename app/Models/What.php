<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class What extends Model
{
    protected $table='what';

    protected $fillable=['description'];
}
