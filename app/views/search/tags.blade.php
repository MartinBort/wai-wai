
@foreach ($data as $object)
		<li><a href="#"><b>{{ $object->spot_name }}</bar>, <i>{{ $object->tag_name }}</i></a></li>
@endforeach