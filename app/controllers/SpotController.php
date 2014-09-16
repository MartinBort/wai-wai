<?php
class SpotController extends BaseController {

	public function tagCurrentLocation() { //should be 'getCreateSpot()'
		return View::make('spots.new-spot-current-location');
	}

	public function postCreateSpot() {

		/*
		//testing POST
		$tags = Input::get('tags');
			foreach ((array) $tags as $tagData)
			{
			   // validate user_id and tag_name first
			   $tag = Tag::create(array_only($tagData, ['user_id', 'tag_name']));
			}

		return View::make('spots.test')->with('tags', $tags);
		*/


		//$inputs = Input::all();
		//return View::make('spots.test')->with('inputs', $inputs);
		
		
		$validator = Validator::make(Input::all(),
			array(
				'spot_name' => 'required|max:50',
				)
			);

		if($validator->fails()) {
			
			return Redirect::route('tag-current-location')
					->withErrors($validator)
					->withInput();

		} else {

			//create spot
			$spot = new Spot;
	        $spot->user_id 			= Input::get('user_id');
	        $spot->latitude 		= Input::get('lat');
	        $spot->longitude 		= Input::get('lng');
	        $spot->spot_name		= Input::get('spot_name');
	        $spot->location_notes 	= Input::get('location_notes');
	        $spot->comments 		= Input::get('comments');
	        $spot->save();

	        //get spot_id for tags table
	        $spot_id	= $spot->spot_id;

	        //dynamic tags
			$tags = Input::get('tags');
			foreach ((array) $tags as $tagData)
			{
				$tag = Tag::create(array_only($tagData, ['user_id', 'tag_name']));
				$tag->spot_id = $spot_id;				
				$tag->save();			    
			}

	        return Redirect::route('home')
							->with('global', 'Spot successfully tagged. You can edit all your spots on your profile.');
		}
		
	}

	public function getViewSpot($spot_id) {
		$spot = Spot::where('spot_id', '=', $spot_id); //query

		if($spot->count()) { //if exist in DB
			$spot = $spot->first(); //first record returned from query

			return View::make('spots.view-spot')
				->with('spot', $spot);
			}
	}

	public function getEditSpot($spot_id) {
		$spot = Spot::where('spot_id', '=', $spot_id); //query

		if($spot->count()) { //if exist in DB
			$spot = $spot->first(); //first record returned from query

			return View::make('spots.edit-spot')
				->with('spot', $spot);
			}

	}

	public function postEditSpot() {

		$validator = Validator::make(Input::all(),
			array(
				'spot_name' => 'required|max:50',
				)
			);

		if($validator->fails()) {
			
			return Redirect::route('edit-spot')
					->withErrors($validator)
					->withInput();

		} else {

			$spot_id = Input::get('spot_id');
			$spot = Spot::where('spot_id', '=', $spot_id)->first();

	        //$spot->latitude 		= Input::get('lat');
	        //$spot->longitude 		= Input::get('lng');
	        $spot->spot_name		= Input::get('spot_name');
	        $spot->location_notes 	= Input::get('location_notes');
	        $spot->comments 		= Input::get('comments');
	        $spot->save();

	        return Redirect::route('user-home')
							->with('global', 'Changes successfully made to your Spot');
		}

	}

	public function deleteSpot($spot_id) {

		$spot = Spot::where('spot_id', '=', $spot_id); //query

		if($spot->count()) { //if exist in DB
			$spot = $spot->first(); //first record returned from query

			//delete record
			$spot->delete();

			return Redirect::route('user-home')
				->with('global', 'Spot successfully deleted');
			}

	}





}