@if(Session::has('global'))
	<p> {{ Session::get('global') }} </p>

@endif
<li><a href="{{ URL::route('home') }}">Home</a></li>
 <br>
 <h1>{{ $user->username }}</h1><br>
<h2>My tagged spots:</h2><br>

<ul>
@foreach ($user->spots as $spots)
		<li>{{ $spots->spot_name }} <a href="{{ URL::route('edit-spot', $spots->spot_id) }}">Edit spot</a></li>
@endforeach
</ul>





