<!DOCTYPE html>
<html>
	<head>
		<title>Wai Wai</title>
		<!-- Prevent iphone browsers from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Google fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>	
		<!-- Google maps API -->
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		{{ HTML::style('css/normalize.min.css') }}
		{{ HTML::style('css/gui.css') }}
	</head>
	<body>
		@if(Session::has('global'))
			<p> {{ Session::get('global') }} </p>
		@endif

		<form action="{{  URL::route('account-sign-in-post') }}" method="post">

			<div class="field">
				Email: <input type="text" name="email" {{ (Input::old('email')) ? ' value="' . e(Input::old('email')) .'" ' : ' ' }}>
				@if($errors->has('email'))
					{{ $errors->first('email') }}
				@endif
			</div>

			<div class="field">
				Password: <input type="password" name="password">
				@if($errors->has('password'))
					{{ $errors->first('password') }}
				@endif
			</div>
			<div class="field">
				<input type="checkbox" name="remember" id="remember">
				<label for="remember">
					Remember me
				</label>
			</div>

			<input type="submit" value="Sign in">

			{{ Form::token() }}

		</form>
		<a id="forgotten-pword" href="{{ URL::route('account-forgot-password') }}">Forgotten password?</a>

	</body>
</html>