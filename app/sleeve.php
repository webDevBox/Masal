<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sleeve extends Model
{
    protected $table = 'sleeves';
    protected $hidden = [
       'created_at', 'updated_at',
    ];
}
