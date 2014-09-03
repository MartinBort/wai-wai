<?php
class HotspotController extends BaseController {

	public function tagCurrentLocation() {
		return View::make('hotspots.new-hotspot-current-location');
	}

}