<?php

namespace Travis;

class Zip2City
{
	public static function run($zip)
	{
		// catch error...
		if (strlen($zip) < 5) throw new \Exception('Zip code must be at least 5 characters.');

		// get json response
		$response = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$zip);


		// return
		return $response;
	}
}