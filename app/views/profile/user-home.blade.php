@if(Session::has('global'))
	<p> {{ Session::get('global') }} </p>

@endif
<li><a href="{{ URL::route('home') }}">Home</a></li>
 <br>
 <h1>{{ $user->username }}</h1><br>
<i>My tagged spots:</i><br>

<ul>
@foreach ($user->spots as $spots)
		<li><a href="{{ URL::route('view-spot', $spots->spot_id) }}">{{ $spots->spot_name }}</a><br> 
			<a href="{{ URL::route('edit-spot', $spots->spot_id) }}">Edit spot</a></li><br>
@endforeach
</ul>





