
<div class="navbar">
	<div class="navbar-inner">
		<a id="logo" href="<?php echo URL::to('/');?>">Logo</a>
		<ul class="nav">
			<li><a href="<?php echo URL::to('/');?>">Home</a></li>
			<li><a href="<?php echo action('PagesController@about');?>">About Us</a></li>
			<li><a href="<?php echo action('PagesController@history');?>">History</a></li>
			@if(!Auth::check())
			<li><a href="<?php echo action('RegisterController@index');?>">Sign Up</a></li>
			<li><a href="<?php echo action('LoginController@index');?>">Sign In</a></li>
			@else
			<li><a href="<?php echo action('AccountController@index');?>">My Account</a></li>
			@endif
			<li><a href="<?php echo action('ContactController@index');?>">Contact</a></li>
			<li><a href="<?php echo action('CountryController@index');?>">Countries</a></li>
			@if(Auth::check())
            <li><a href="<?php echo URL::to('/logout');?>">Logout</a></li>
        @endif
		</ul>
		<?php //echo $url = action('HomeController@signup');
	
//echo $url = asset('uploads/photo.jpg');	
//echo secure_url('signup');
//echo link_to('signup');
//echo link_to('signup', "About Us", $attributes = array(), $secure = null);
		?>
	</div>
</div>
@if(Session::has('message'))
    <div class="alert-box success">
        <h2>{{ Session::get('message') }}</h2>
    </div>
@endif
@if(Auth::check())
            <p>Welcome to your profile page {{Auth::user()->fullname}}</p>
        @endif
        
        <?php
        //echo $email = Auth::user()->email;
        //echo $id = Auth::id();
        ?>