<?php
/*works perfectly*/
class LoginController extends BaseController {

	public function index()
	{
		if(Auth::check()){
				return Redirect::to('/');	
		}

		/*
		manually login
		$user = User::find(1);
		
		Auth::login($user);
		*/		
		
		$data = Input::only(['email', 'password']);
		if(Input::get()){
			//after form validation
			$validator = Validator::make(
				    Input::all(),
				    array(
				        'email' => 'required|email',
						  'password'  =>'required'
				    )
				);
				if ($validator->fails())
				{
				    // The given data did not pass validation
				    $messages = $validator->messages();
				    foreach ($messages->all('<p>:message</p>') as $message)
					 {
						 echo $message;
					 }				    
				} else {
					if(Auth::attempt(array('email' => $data['email'], 'password' => $data['password']))){
						Session::flash('message', 'Loggedin Successfully');
			         //return Redirect::to('/');
						return Redirect::intended('/');//redirect to previous url(referrer page)
			      } else {
			      	//Session::flash('message', 'Incorrect Login Credentials');
			      	return Redirect::to('login')->with('message', 'Login Failed');
			      }
			  }
      }
		return View::make('login.index');
	}

}
