@extends('layouts.master')
@section('content')


<div>
<h1>Countries List</h1>
<form action="<?php echo URL::to('/country/search');?>">
<input type="text" name="country" value="<?php echo Input::get('country');?>" placeholder="Country Name"/>

<input type="submit" name="submit" value="Search" />
</form>


<div class="container">
<table>
<tr><th>Name</th></tr>
    <?php foreach ($countries as $country): ?>
    <tr><td>
        <?php echo $country->name; ?>
    </td></tr>
    <?php endforeach; ?>
</div>
</table>
<?php //echo $countries->appends(array('country' => Input::get('country')))->links(); ?>
<?php echo $countries->appends($query)->links(); ?>
</div>

@stop