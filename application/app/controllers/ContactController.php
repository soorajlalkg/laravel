<?php
/*works perfectly*/
class ContactController extends BaseController {

	public function index()
	{
		if(Input::get()){
				$validator = Validator::make(
				    Input::all(),
				    array(
				        'name' => 'required',
				        'email' => 'required|email',
				        'comment' => 'required',				   
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
					//insert to db + success message
					$email = Input::get('email');
					$data  = array('firstname'=>Input::get('firstname'));
					//@todo : change settings of app/config/mail.php
					//views/emails/contact.blade.php
					Mail::send('emails.contact', $data, function($message){
				        $message->to(Input::get('email'), Input::get('name'))->subject('Welcome to the Laravel 4 Auth App!');
				    });
				 
				   return Redirect::to('contact')->with('message', 'Thanks for registering!');
					/*$user 			 = new User();	    
					$user->email 	 = Input::get('email');
					$user->fullname = Input::get('name');
					$user->username = Input::get('username');
					$user->password = Hash::make(Input::get('password')); 
					$user->status   = 0;
					$user->save();*/
					//Session::flash('message', 'Sent Successfully');
					
				}	
			}
			return View::make('contact.index');
		
	}

}
