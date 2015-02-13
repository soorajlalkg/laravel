<!doctype html>
<html>
<head>
	@include('common.head')
</head>
<body>
<div class="container">

	<header class="row">
		@include('common.header')
	</header>

	<div id="main" class="row">

			@yield('content')

	</div>

	<footer class="row">
		@include('common.footer')
	</footer>

</div>
</body>
</html>