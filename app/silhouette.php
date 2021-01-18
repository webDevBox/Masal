<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class silhouette extends Model
{
   protected $table='silhouettes';
   protected $hidden = [
    'created_at', 'updated_at',
   ];
}
