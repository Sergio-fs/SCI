<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
	protected $table = 'regiones';
    public function municipios()
    {
        return $this->hasMany('App\Municipio');
    }
    public function cedulas()
    {
       return $this->hasMany('App\Cedula');
    } 
}
