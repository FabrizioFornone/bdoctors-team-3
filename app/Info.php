<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = ['CV', 'photo', 'address', 'city', 'phone', 'performances'];


    public function user() {
        return $this->belongsTo('App\User');
    }

    public function specializations() {
        return $this->belongsToMany('App\Specialization');
    }
}
