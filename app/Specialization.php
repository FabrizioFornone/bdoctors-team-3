<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    public function infos() {
        return $this->belongsToMany('App\Info');
    }
}
