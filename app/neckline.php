<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class neckline extends Model
{
   protected $table='necklines';
   protected $hidden = [
    'created_at', 'updated_at',
   ];
}
