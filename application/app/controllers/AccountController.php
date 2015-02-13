<?php

class AccountController extends BaseController {


	public function index()
	{
		//dashboard
				
		//update query
		$id = Auth::id();
		$user = User::find($id);
		
		/*update*/
		/*$user = User::find(2);
		$user->email = 'john@foo.com';
		$user->save();*/
		return View::make('account.index');
	}

	public function profile()
	{

	}

	public function change_password()
	{

	}
	
	public function queries()
	{
		//insert
		$user 			 = new User();	    
		$user->email 	 = Input::get('email');
		$user->fullname = Input::get('name');
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password')); 
		$user->status   = 0;
		$user->save();
		
		//update
		$user = User::find(1);
		$user->email = 'john@foo.com';
		$user->save();
		
		//delete
		$user = User::find(1);
		$user->delete();
		
		//delete condition
		$affectedRows = User::where('votes', '>', 100)->delete();
		
		//Retrieving All Rows From A Table
		$users = DB::table('users')->get();
		
		//retrieve single row
		$user = DB::table('users')->where('name', 'John')->first();
		
		//specifying select clause
		$users = DB::table('users')->select('name', 'email')->get();
		$users = DB::table('users')->distinct()->get();
		$users = DB::table('users')->select('name as user_name')->get();
		$users = DB::table('users')->where('votes', '>', 100)->get();
		$users = DB::table('users')
                    ->where('votes', '>', 100)
                    ->orWhere('name', 'John')
                    ->get();
      $users = DB::table('users')
                    ->whereBetween('votes', array(1, 100))->get();
      $users = DB::table('users')
                    ->whereNotBetween('votes', array(1, 100))->get();
      $users = DB::table('users')
                    ->whereIn('id', array(1, 2, 3))->get();

		$users = DB::table('users')
                    ->whereNotIn('id', array(1, 2, 3))->get();
      $users = DB::table('users')
                    ->orderBy('name', 'desc')
                    ->groupBy('count')
                    ->having('count', '>', 100)
                    ->get();
      DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.id', 'contacts.phone', 'orders.price')
            ->get();
      DB::table('users')
        ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
        ->get();
        
        //insert
      DB::table('users')->insert(
		    array('email' => 'john@example.com', 'votes' => 0)
		);    
		$id = DB::table('users')->insertGetId(
		    array('email' => 'john@example.com', 'votes' => 0)
		); 
		DB::table('users')
            ->where('id', 1)
            ->update(array('votes' => 1));
      DB::table('users')->increment('votes');
      DB::table('users')->where('votes', '<', 100)->delete();
      
      $first = DB::table('users')->whereNull('first_name');
		$users = DB::table('users')->whereNull('last_name')->union($first)->get();                                                
		
		
	}
	
	public function paginnation()
	{
		$allUsers = User::paginate(15);

		$someUsers = User::where('votes', '>', 100)->paginate(15);
		
		$users = DB::table('users')->paginate(15);
   }

}
