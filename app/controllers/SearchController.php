<?php
class SearchController extends BaseController {

	public function searchTags() {

		$searchTerm = Input::get('query');

		if(Request::ajax()){ //on keyup (AJAX)

			$data = DB::table('spots')
				->groupBy('tags.tag_name') //groups identical returns, stops duplicate tag name
				->join('tags', 'spots.spot_id', '=', 'tags.spot_id')
				->select('spots.spot_id', 'spots.spot_name', 'spots.latitude', 'spots.longitude', 'tags.tag_name')
				->where('tags.tag_name', 'LIKE', $searchTerm.'%')
				->get();

		    return json_encode($data);  //turn the result value to JSON so it can be parsed and handled in JavaScript
		
		} else { //if user hits submit

			//groupBy not used on submit, as identical tag names can belong to different spots
			$data = DB::table('spots')
				->join('tags', 'spots.spot_id', '=', 'tags.spot_id')
				->select('spots.spot_id', 'spots.spot_name', 'spots.latitude', 'spots.longitude', 'tags.tag_name')
				->where('tags.tag_name', 'LIKE', $searchTerm.'%')
				->get();

			return View::make('search.tags')->with('data', $data);
		}
	}

	public function searchSpots() {

		$searchTerm = Input::get('query');

		if(Request::ajax()){ //on keyup (AJAX)

			$data = DB::table('spots')
				->groupBy('spots.spot_id') //groups identical returns, stops duplicates created by spots with multiple tags
				->join('tags', 'spots.spot_id', '=', 'tags.spot_id')
				->select('spots.spot_id', 'spots.spot_name', 'spots.latitude', 'spots.longitude', 'tags.tag_name')
				->where('spots.spot_name', 'LIKE', $searchTerm.'%')
				->get();

		    return json_encode($data);  //turn the result value to JSON so it can be parsed and handled in JavaScript
		
		} else { //if user hits submit

			$data = DB::table('spots')
				->groupBy('spots.spot_id')
				->join('tags', 'spots.spot_id', '=', 'tags.spot_id')
				->select('spots.spot_id', 'spots.spot_name', 'spots.latitude', 'spots.longitude', 'tags.tag_name')
				->where('spots.spot_name', 'LIKE', $searchTerm.'%')
				->get();

			return View::make('search.tags')->with('data', $data);
		}

	}

	public function searchNearMe() {
		
		$latpoint = Input::get('lat');
		$longpoint = Input::get('lng');

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
										                10.0 AS radius,      111.045 AS distance_unit
										    ) AS p ON 1=1
										  WHERE z.latitude
										     BETWEEN p.latpoint  - (p.radius / p.distance_unit)
										         AND p.latpoint  + (p.radius / p.distance_unit)
										    AND z.longitude
										     BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
										         AND p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint))))
										  ORDER BY distance_in_km
										  LIMIT 10"));

		/* raw sql by Ollie Jones - referenced from
		http://www.plumislandmedia.net/mysql/haversine-mysql-nearest-loc/
		*/


		if(Request::ajax()){

				    return json_encode($results);  //turn the result value to JSON so it can be handled in JQuery
				
				}
	}

}