@extends('layouts.master')
@section('content')

<?php
//echo Form::open(array('url' => 'signup'));
?>

<form method="POST" action="<?php echo URL::to('/register');?>" novalidate>

	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" id="name" class="form-control" name="name" value="<?php echo Input::get('name');?>" placeholder="Somebody Important">
	</div>

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" id="email" class="form-control" name="email" value="<?php echo Input::get('email');?>" placeholder="super@cool.com">
	</div>

	<div class="form-group">
		<label for="email">Username</label>
		<input type="username" id="username" class="form-control" name="username" value="<?php echo Input::get('username');?>" placeholder="s">
	</div>

	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" id="password" class="form-control" name="password">
	</div>

	<div class="form-group">
		<label for="password_confirm">Confirm Password</label>
		<input type="password" id="password_confirm" class="form-control" name="password_confirmation">
	</div>

	<button type="submit" class="btn btn-success">Go Ducks Go!</button>

</form>

@stop