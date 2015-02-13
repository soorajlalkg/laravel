@extends('layouts.master')
@section('content')

<?php
//echo Form::open(array('url' => 'signup'));
?>

<form method="POST" action="<?php echo URL::to('/contact');?>" novalidate>

	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" id="name" class="form-control" name="name" value="<?php echo Input::get('name');?>" placeholder="Somebody Important">
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" id="email" class="form-control" name="email" value="<?php echo Input::get('email');?>" placeholder="super@cool.com">
	</div>
	
	<div class="form-group">
        <label for="comment">Comment:</label>
        <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
   </div>

	<button type="submit" class="btn btn-success">Go Ducks Go!</button>

</form>

@stop