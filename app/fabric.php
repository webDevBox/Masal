<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fabric extends Model
{
    protected $table = 'fabrics';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
