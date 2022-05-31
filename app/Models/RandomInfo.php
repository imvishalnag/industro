<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RandomInfo extends Model
{
   protected $table='random_infos';

   protected $fillable=['name','phone','date','about'];
}
