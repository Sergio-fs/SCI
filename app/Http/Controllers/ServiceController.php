<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipio;
use App\Region;

class ServiceController extends Controller
{
	public function GetRegiones()
	{
		$regiones = Region::all();
		$data[0] = [];
		foreach ($regiones as $key => $value) {
			$data[$key] = [
				'value'   => strval($value->id),
				'text' => $value->region,
			];
		}
		return response()->json($data);
	}

    public function GetMunicipios()
    {
    	$municipios = Municipio::all();
    	$data = [];
    	$data[0] = [];
    	foreach ($municipios as $key => $value) {
    		$data[$key] =[
    			'value'  => strval($value->id),
    			'text' => $value->municipio." - ".$value->cabeceraMunicipal." - ".$value->region->region,
    		];
    	}
    	return response()->json($data);
    }
}
