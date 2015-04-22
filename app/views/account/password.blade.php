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

		<div class="field"><p>Change your password</p></div>

		<form action="{{ URL::route('account-change-password-post') }}" method="post">
			<div class="field">
				<h3>Old password:</h3> 
					<input type="password" name="old_password">
					@if($errors->has('old_password'))
						{{ $errors->first('old_password') }}
					@endif
			</div>
			<div class="field">
				<h3>New password:</h3>
					<input type="password" name="password">
					@if($errors->has('password'))
						{{ $errors->first('password') }}
					@endif
			</div>
			<div class="field">
				<h3>Confirm new password:</h3>
					<input type="password" name="password-confirm">
					@if($errors->has('password-confirm'))
						{{ $errors->first('password-confirm') }}
					@endif
			</div>
			<input class="btn yellow-btn" type="submit" value="Change password">
			{{ Form::token() }}
		</form>

	</body>
</html>