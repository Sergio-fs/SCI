<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cedula extends Model
{
	use SoftDeletes;
		/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fechaDes', 'fechaRep', 'apellidoPat', 'apellidoMat', 'nombres', 'mediaFil', 'vestimenta', 'señasPar', 'ultimoAvi', 'nombreArch', 'numeroCed', 'edad', 'peso', 'estatura', 'region_id', 'municipio_id',
    ];
    protected $attributes = [
        'localizada' => false,
   
    ];

    public function municipio()
    {
        return $this->belongsTo('App\Municipio');
    }
    
    public function region()
    {
        return $this->belongsTo('App\Region');
    }
}
