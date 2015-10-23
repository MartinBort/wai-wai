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
		<a href="{{ URL::route('home') }}"><img src="../img/back-btn-black.png"></a>
		<div id="form-logo"><img src="../img/banner/logo.png"></div>

		<form action="{{ URL::route('account-create-post') }}" method="post">

			<div class="field">
				<h3>Email:</h2> 
					<input type="email" name="email" {{ (Input::old('email')) ? ' value="' . e(Input::old('email')) .'" ' : ' ' }}>
					@if($errors->has('email'))
						{{ $errors->first('email')}}
					@endif
			</div>

			<div class="field">
				<h3>Username:</h3>
					<input type="text" name="username" {{ (Input::old('username')) ? ' value="' . e(Input::old('username')) .'" ' : ' ' }}>
					@if($errors->has('username'))
						{{ $errors->first('username')}}
					@endif
			</div>

			<div class="field">
				<h3>Password:</h3>
					<input type="password" name="password">
					@if($errors->has('password'))
						{{ $errors->first('password')}}
					@endif
			</div>

			<div class="field">
				<h3>Confirm password:</h3> 
					<input type="password" name="password_confirm">
					@if($errors->has('password_confirm'))
						{{ $errors->first('password_confirm')}}
					@endif
			</div>


			<input class="btn yellow-btn" type="submit" value="Create account">
			{{ Form::token() }}




		</form>

	</body>
</html>