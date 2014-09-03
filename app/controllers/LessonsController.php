<?php
class LessonsController extends BaseController {

	public function lessonsIndex() {
		return View::make('lessons.lessonsIndex');
	}

}