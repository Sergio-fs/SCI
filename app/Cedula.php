<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cedula extends Model
{
		/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fechaDes', 'fechaRep', 'apellidoPat', 'apellidoMat', 'nombres', 'mediaFil', 'vestimenta', 'señasPar', 'ultimoAvi', 'nombreArch', 'numeroCed', 'edad', 'peso', 'estatura'
    ];

}
