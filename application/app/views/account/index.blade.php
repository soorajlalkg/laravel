@extends('layouts.master')
@section('content')

<?php
//echo Form::open(array('url' => 'signup'));
?>

<form method="POST" action="<?php echo URL::to('/account');?>" novalidate>

	<div class="form-group">
		<label for="name">Name</label>
		<input type="text" id="name" class="form-control" name="name" value="<?php echo Input::get('name');?>" placeholder="Somebody Important">
	</div>

	<div class="form-group">
		<label for="email">Username</label>
		<input type="username" id="username" class="form-control" name="username" value="<?php echo Input::get('username');?>" placeholder="s">
	</div>

	<button type="submit" class="btn btn-success">Go Ducks Go!</button>

</form>

@stop