<?php
class AjaxRequestController extends BaseController {

	public function searchTags() {

		$searchTerm = Input::get('search-term');

		$data = DB::table('spots')
			->join('tags', 'spots.spot_id', '=', 'tags.spot_id')
			->select('spots.spot_id', 'spots.spot_name', 'spots.latitude', 'spots.longitude', 'tags.tag_name')
			->where('tags.tag_name', 'LIKE', '%'. $searchTerm .'%')
			->get();
		
		if(Request::ajax()){ //on keyup

		    return json_encode($data);  //turn the result value to JSON so it can be handled in JQuery
		
		} else { //user hits submit

			return View::make('search.tags')->with('data', $data);
		}
		
	}

}