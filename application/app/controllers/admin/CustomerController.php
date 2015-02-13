<?php

class CustomerController extends BaseController {

	
	public function showWelcome()
	{
		/*if(!Auth::check()){
				return Redirect::to('/');	
		}*/
		return View::make('admin.customer.index');//admin/customer/index.blade.php
	}

}
