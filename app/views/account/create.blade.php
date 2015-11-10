<!DOCTYPE html>
<html>
	<head>
		<title>Wai Wai</title>
		<!-- Prevent iphone browsers from zooming -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		{{ HTML::style('css/build/style.css') }}
	</head>
	<body>
		<div class="wrapper">
			<a class="form-back-btn" href="{{ URL::route('home') }}"><img src="../img/back-btn-black.png"></a>
			<h1 class="form-header">Sign up</h1>

			<form action="{{ URL::route('account-create-post') }}" method="post">
				<div class="field-wrapper create-blade">

					<div class="field">
						<label for="email">Email:</label> 
							<input 	id="email" 
									type="email" 
									name="email" 
									placeholder="example@email.com" 
									{{ (Input::old('email')) ? ' value="' . e(Input::old('email')) .'" ' : ' ' }}
									>
							@if($errors->has('email'))
								{{ $errors->first('email')}}
							@endif
					</div>

					<div class="field">
						<label for="username">Username:</label>
							<input 	id="username" 
									type="text" 
									name="username"
									placeholder="Pick a username" 
									{{ (Input::old('username')) ? ' value="' . e(Input::old('username')) .'" ' : ' ' }}
									>
							@if($errors->has('username'))
								{{ $errors->first('username')}}
							@endif
					</div>

					<div class="field">
						<label for="password">Password:</label>
							<input id="password" type="password" name="password" placeholder="******">
							@if($errors->has('password'))
								{{ $errors->first('password')}}
							@endif
					</div>

					<div class="field">
						<label for="password-confirm">Confirm password:</label> 
							<input id="password-confirm" type="password" name="password_confirm" placeholder="******">
							@if($errors->has('password_confirm'))
								{{ $errors->first('password_confirm')}}
							@endif
					</div>

				</div><!-- /.field-wrapper -->

				<div class="form-btn-wrapper">
					<input class="btn btn-yellow" type="submit" value="Create account">
				</div>
				{{ Form::token() }}
			</form>
		</div><!-- /.wrapper -->
	</body>
</html>