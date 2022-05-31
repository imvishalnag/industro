<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hse extends Model
{
    protected $table='hse';

    protected $fillable=['description'];
}
