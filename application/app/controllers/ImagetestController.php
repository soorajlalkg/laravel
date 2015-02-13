<?php

class ImagetestController extends BaseController {


	public function index()
	{
		//upload image
		$error = false;
		if(Input::get()){
			
			// getting all of the post data
			$files = Input::file('photo');
			//print_r($files);
			foreach($files as $file) {
			  // validating each file.
			  $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
			  $validator = Validator::make(array('file'=> $file), $rules);
			  if($validator->passes()){
			    // path is root/uploads
			    $destinationPath = 'uploads';
			    $filename = $file->getClientOriginalName();
			    $upload_success = $file->move($destinationPath, $filename);
			    // flash message to show success.
			    //Session::flash('success', 'Upload successfully'); 
			    //return Redirect::to('image');
			  } 
			  else {
			    // redirect back with errors.
			    $error = true;
			    return Redirect::to('image')->withInput()->withErrors($validator);
			  }
  			}
			//echo 'ss';
			/*$file = Input::file('photo');	
			$destinationPath = 'uploads';
		   $filename = $file->getClientOriginalName();
//echo $extension =$file->getClientOriginalExtension(); 
			// If the uploads fail due to file system, you can try doing public_path().'/uploads' 
			//$filename = str_random(12);
			$upload_success = Input::file('photo')->move($destinationPath, $filename);
			//$test  = (array)$upload_success;
			//echo '<pre>';print_r($upload_success);
			//echo $upload_success->fileName;
			$asseturl = asset('uploads/'.$filename);
			echo '<img src="'.$asseturl.'" width="50%"/>';
			//$path = Input::file('photo')->getRealPath();*/
			
			if($error == false){
				Session::flash('message', 'Upload successfully'); 
				}

		}		
		
		return View::make('image.upload');
	}

}
