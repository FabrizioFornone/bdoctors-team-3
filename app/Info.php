<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'CV', 'photo', 'address', 'phone',
    ];
}
