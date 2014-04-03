<nav>
	<ul>
		<li><a href="{{ URL::Route('home') }}">Home</a></li>

		@if(Auth::check())
		
		@else
			<li><a href="{{ URL::Route('account-sign-in') }}">Sign in</a></li>
			<li><a href="{{ URL::Route('account-create') }}">Create Account</a></li>
		@endif
	</ul>
</nav>