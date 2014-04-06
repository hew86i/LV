<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Auth SYSTEM</title>
	<!-- commnet for git -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	{{ HTML::style('css/style.css')}}
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);
		body {
			margin-top: 40px;
			font-family:'Lato', sans-serif;			
			color: #999;
		}
	</style>

</head>
<body>
	<div class="container">
		@if(Session::has('global'))
			<h3>{{ Session::get('global') }}</h3>
		@endif

		@include('layout.navigation')
		@yield('content')
	</div>

	<script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>	
</body>
	
</html>