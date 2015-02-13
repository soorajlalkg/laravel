@extends('layouts.master')
@section('content')

<?php
//echo Form::open(array('url' => 'signup'));
?>

<form method="POST" action="<?php echo URL::to('/login');?>" novalidate autocomplete="off">


	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" id="email" class="form-control" name="email" value="<?php echo Input::get('email');?>" placeholder="super@cool.com">
	</div>

	<?php /*<div class="form-group">
		<label for="email">Username</label>
		<input type="username" id="username" class="form-control" name="username" value="<?php //echo Input::get('username');?>" placeholder="s">
	</div>*/?>

	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" id="password" class="form-control" name="password">
	</div>

	<button type="submit" class="btn btn-success">Go Ducks Go!</button>

</form>

@stop