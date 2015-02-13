<?php
/*works perfectly*/
class PagesController extends BaseController {

	public function index()
	{
		return View::make('pages.index');
	}
	
	public function about() 
	{
		//get from database
		$content = "huyg ug uitugui tyuuyt yufyuur yfyuryghguyt tuut yuuytyu ";
		//return View::make('pages.index');
		return View::make('pages.index', array('title' => 'About', 'content'=>$content));
	}
	
	public function history()
	{
		$content = "ppopiiusa yutsytrarq5645665 5446766";
		//return View::make('pages.index');
		return View::make('pages.index', array('title' => 'History', 'content'=>$content));
   }
   

}
