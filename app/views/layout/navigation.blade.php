<nav>
	<ul>
		<!-- <li><a href="{{ URL::route('home') }}">Home</a></li> -->
		@if(Auth::check())
		<li><a href="{{ URL::route('user-home') }}">My Profile</a></li>
		<!-- <li><a href="{{ URL::route('account-change-password') }}">Change password</a></li> -->
		<li><a href="{{ URL::route('tag-current-location') }}">Tag a Hotspot!</a></li>
		<li><a href="{{ URL::route('account-sign-out') }}">Sign out</a></li>


		@else
		<li><a href="{{ URL::route('account-sign-in') }}">Sign in</a></li>
		<li><a href="{{ URL::route('account-create') }}">Create Account</a></li>
		<li><a href="{{ URL::route('account-forgot-password') }}">Forgot password</a></li>
		@endif

	</ul>
</nav>