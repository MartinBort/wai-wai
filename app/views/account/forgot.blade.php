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

		<a href="{{ URL::route('account-sign-in') }}"><img src="../img/back-btn-black.png"></a>
		<div id="form-logo"><img src="../img/banner/logo.png"></div>

		@if(Session::has('global'))
			<p> {{ Session::get('global') }} </p>
		@endif

		<form action="{{ URL::route('account-forgot-password-post') }}" method="post">
			<div class="field">
				<h3>Enter email to recover account:</h3> 
				<input type="email" name="email" {{ (Input::old('email')) ? ' value="' . e(Input::old('email')) .'" ' : ' ' }}>
				@if($errors->has('email'))
					{{ $errors->first('email') }}
				@endif
			</div>
			<input class="btn yellow-btn" type="submit" value="Recover">
			{{ Form::token() }}

		</form>

	</body>
</html>