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
			<h1 class="form-header">Sign in</h1>

			@if(Session::has('global'))
				<p> {{ Session::get('global') }} </p>
			@endif

			
			<form action="{{  URL::route('account-sign-in-post') }}" method="post">
			<div class="field-wrapper signin-blade">

				<div class="field">
						<label for="email">Email</label>
						<input placeholder="example@email.com" id="email" type="email" name="email" {{ (Input::old('email')) ? ' value="' . e(Input::old('email')) .'" ' : ' ' }}>
						@if($errors->has('email'))
							{{ $errors->first('email') }}
						@endif
					</div>

					<div class="field">
						<label for="password">Password</label>
						<input placeholder="******" id="password" type="password" name="password">
						@if($errors->has('password'))
							{{ $errors->first('password') }}
						@endif
					</div>
										
			</div>
			
			<div class="account-action-links">
				<a id="forgotten-pword" href="{{ URL::route('account-forgot-password') }}">Forgotten password?</a>	
			</div>
			<div class="account-action-links">
				<a href="{{ URL::route('account-create') }}">Create account</a>
			</div>
				
				<!-- <div>
					<span>
					<label for="remember">Remember me? </label>
						<input type="checkbox" name="remember" id="remember">
					</span>
				</div> -->

				<!-- submit -->
				<div class="form-btn-wrapper">
					<input class="btn btn-yellow" type="submit" value="Sign in">
				</div>
					

				{{ Form::token() }}
			</form>
			
		</div> <!-- /wrapper -->

	</body>
</html>