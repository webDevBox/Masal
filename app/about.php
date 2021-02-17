<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    protected $table= 'abouts';
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
