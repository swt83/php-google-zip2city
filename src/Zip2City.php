<?php

namespace Travis;

class Zip2City
{
	public static $map = [

		'city' => 'locality',
		'state' => 'administrative_area_level_1',
		'zip' => 'postal_code',

	];

	public static function run($zip)
	{
		// catch error...
		if (strlen($zip) < 5) throw new \Exception('Zip code must be at least 5 characters.');

		// get json response
		$response = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$zip);

		// decode
		$response = json_decode($response);

		// convert to array
		$response = object2array($response);

		// init
		$final = [];

		// extract
		foreach (ex($response, 'results.0.address_components', []) as $part)
		{
			foreach (static::$map as $key => $value)
			{
				if (in_array($value, $part['types']))
				{
					$final[$key]['long'] = $part['long_name'];
					$final[$key]['short'] = $part['short_name'];
				}
			}
		}

		// return
		return $final;
	}
}