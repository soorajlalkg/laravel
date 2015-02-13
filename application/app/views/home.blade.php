@extends('layouts.master')
@section('content')
	i am the home page
<?php /*	
{{ Form::open(array('url' => 'foo/bar')) }}
    //
{{ Form::close() }}
*/?>


<?php
echo Form::open(array('url' => 'foo/bar', 'files' => true));
echo Form::label('email', 'E-Mail Address');
echo Form::text('email', 'example@gmail.com');
?>


@stop