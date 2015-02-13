<?php

class CountryController extends BaseController {

	public function index()
	{
		//list
		//$countries = DB::table('countries')->paginate(15);
		$countries = Country::paginate(15);
		//custom pagination from db
		/*$countries = DB::table('countries')
                    ->where('id', '>', 10)
                    ->Where('name', 'LIKE', '%e%')
                    ->paginate(15);*/
		
		
		return View::make('country.index', array('countries'=>$countries, 'query'=>''));
	}
	
	public function search() 
	{
		//filter
		$name = Input::get('country');
		//print_r(Input::query());
		$query = array_except( Input::query(), Paginator::getPageName() );
		$countries = Country::where('name', 'LIKE', '%'.$name.'%')->paginate(15);
		/*$countries = DB::table('countries')
                    ->where('id', '>', 10)
                    ->Where('name', 'LIKE', '%'.$name.'%')
                    ->paginate(15);*/
		
		return View::make('country.index', array('countries'=>$countries, 'query'=>$query));
	}
   

}
