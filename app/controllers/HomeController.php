<?php

class HomeController extends BaseController {


	public function getHome()
	{
		if (Auth::check()){
			
		    return View::make('home-map');

		} else {

			return View::make('home');			
		}
		
	}

	public function getAbout()
	{
		return View::make('tell-me-more');
	}

	public function getHomeMap() /*depracted */
	{
		return View::make('home-map');		
	}

	public function ajaxHomeMap() /*depracted */
	{
		$latpoint = Input::get('latitude');
		$longpoint = Input::get('longitude');

		$results = DB::select( DB::raw(" SELECT z.spot_id,
										        z.spot_name,
										        z.latitude, z.longitude,
										        p.distance_unit
										                 * DEGREES(ACOS(COS(RADIANS(p.latpoint))
										                 * COS(RADIANS(z.latitude))
										                 * COS(RADIANS(p.longpoint) - RADIANS(z.longitude))
										                 + SIN(RADIANS(p.latpoint))
										                 * SIN(RADIANS(z.latitude)))) AS distance_in_km
										  FROM spots AS z
										  JOIN (   /* these are the query parameters */
										        SELECT  '$latpoint'  AS latpoint,  '$longpoint' AS longpoint, /*pass lat lng variables*/
										                5.0 AS radius,      111.045 AS distance_unit
										    ) AS p ON 1=1
										  WHERE z.latitude
										     BETWEEN p.latpoint  - (p.radius / p.distance_unit)
										         AND p.latpoint  + (p.radius / p.distance_unit)
										    AND z.longitude
										     BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
										         AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
										  ORDER BY distance_in_km
										  LIMIT 5"));

		//return result to view
		//return View::make('home-map')->with('results', $results);
		if(Request::ajax()){

		    return json_encode($results);  //turn the result value to JSON so it can be handled in JQuery
		
		}

	}

}

