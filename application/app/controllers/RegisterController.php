<?php
/*works perfectly*/
class RegisterController extends BaseController {

	public function index()
	{
		if(Auth::check()){
				return Redirect::to('/');	
		}
		if(Input::get()){
				$validator = Validator::make(
				    Input::all(),
				    array(
				        'name' => 'required',
				        'email' => 'required|email|unique:user',
				        'username' => 'required|unique:user',
						  'password'  =>'required|confirmed|min:4',
				        'password_confirmation'=>'required'
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
						//return Redirect::to('signup')->withErrors($validator);
				    
				} else {
					//insert to db + success message
					
					$user 			 = new User();	    
					$user->email 	 = Input::get('email');
					$user->fullname = Input::get('name');
					$user->username = Input::get('username');
					$user->password = Hash::make(Input::get('password')); 
					$user->status   = 0;
					$user->save();
					Session::flash('message', 'Created Successfully');
					
				}	
			}
			return View::make('register.index');
		
	}

}
