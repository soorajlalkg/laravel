@extends('layouts.master')
@section('content')

<?php
//echo Form::open(array('url' => 'signup'));
?>

<form action="<?php echo URL::to('/image');?>" method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label for="photo">Select File</label>
		<!--<input type="file" name="photo" />-->
		<input type="file" name="photo[]" multiple="multiple" />
	</div>
<input type="submit" name="submit" value="Submit" />


</form>

@stop