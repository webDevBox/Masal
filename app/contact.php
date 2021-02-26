<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $table='contacts';
    protected $hidden=[
        'created_at','updated_at'
    ];
}
