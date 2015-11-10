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
			<a class="form-back-btn" href="{{ URL::route('account-sign-in') }}"><img src="../img/back-btn-black.png"></a>
			@if(Session::has('global'))
				<p> {{ Session::get('global') }} </p>
			@endif
			<h3 class="form-header">Enter email to recover account</h3> 
			<form action="{{ URL::route('account-forgot-password-post') }}" method="post">
			<div class="field-wrapper forgot-blade">
				<div class="field">
						<label for="email">Email</label>
						<input 	id="email" 
								type="email" 
								name="email"
								placeholder="email@example.com"
								{{ (Input::old('email')) ? ' value="' . e(Input::old('email')) .'" ' : ' ' }}
								>
						@if($errors->has('email'))
							{{ $errors->first('email') }}
						@endif
					</div>
					
					
				
			</div>
				
			<div class="form-btn-wrapper">
				<input class="btn yellow-btn" type="submit" value="Recover">
			</div>
			{{ Form::token() }}
			</form>		
		</div>
	</body>
</html>