<?php
class SearchController extends BaseController {

	public function searchTags() {

		$searchTerm = Input::get('query');

		if(Request::ajax()){ //on keyup (AJAX)

			$data = DB::table('spots')
				->join('tags', 'spots.spot_id', '=', 'tags.spot_id')
				->select('spots.spot_id', 'spots.spot_name', 'spots.latitude', 'spots.longitude', 'tags.tag_name')
				->where('tags.tag_name', 'LIKE', $searchTerm.'%')
				->get();

		    return json_encode($data);  //turn the result value to JSON so it can be parsed and handled in JavaScript
		
		} else { //if user hits submit

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
				->join('tags', 'spots.spot_id', '=', 'tags.spot_id')
				->select('spots.spot_id', 'spots.spot_name', 'spots.latitude', 'spots.longitude', 'tags.tag_name')
				->where('spots.spot_name', 'LIKE', $searchTerm.'%')
				->get();

		    return json_encode($data);  //turn the result value to JSON so it can be parsed and handled in JavaScript
		
		} else { //if user hits submit

			$data = DB::table('spots')
				->join('tags', 'spots.spot_id', '=', 'tags.spot_id')
				->select('spots.spot_id', 'spots.spot_name', 'spots.latitude', 'spots.longitude', 'tags.tag_name')
				->where('spots.spot_name', 'LIKE', $searchTerm.'%')
				->get();

			return View::make('search.tags')->with('data', $data);
		}

	}

	public function searchNearMe() {
		/* 
			pass in lat+lang
			search with raw query
			return DB results
			load new view
		*/
	}

}