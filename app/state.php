<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    protected $table = 'states';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
