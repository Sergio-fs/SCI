<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    public function cedulas()
    {
       return $this->hasMany('App\Cedula');
    } 
}
