<?php

use App\Region;
use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region = New Region();
   	    $region->region = "LA PIEDAD";	  						
		$region->save();

		$region = New Region();
   	    $region->region = "ZAMORA";	  						
		$region->save();

		$region = New Region();
   	    $region->region = "JIQUILPAN";	  						
		$region->save();

		$region = New Region();
   	    $region->region = "MORELIA";	  						
		$region->save();

		$region = New Region();
   	    $region->region = "URUAPAN";	  						
		$region->save();

		$region = New Region();
   	    $region->region = "ZITÁCUARO";	  						
		$region->save();

		$region = New Region();
   	    $region->region = "APATZINGÁN";	  						
		$region->save();

		$region = New Region();
   	    $region->region = "HUETAMO";	  						
		$region->save();

		$region = New Region();
   	    $region->region = "LÁZARO CÁRDENAS";	  						
		$region->save();

		$region = New Region();
   	    $region->region = "COALCOMÁN DE VAZQUEZ PALLARES";	  						
		$region->save();
    } 
}
