<div id="map-canvas" style="height:500px;width:100%;"></div>

<form id="results">	

@foreach ($data as $object)
		<div class="result">
			<li>
				<a href="{{ URL::route('view-spot', $object->spot_id) }}">
					<b>{{ $object->spot_name }}</b>, 
					<i>{{ $object->tag_name }}</i>
					<input type="hidden" id="lat" value="{{ $object->latitude }}" name="lat">
					<input type="hidden" id="lng" value="{{ $object->longitude }}" name="lng">
				</a>
			</li>
		</div>				
@endforeach

<input type="button" id="check" value="check">
</form>

{{ HTML::script('js/jquery-1.11.1.min.js') }}
{{ HTML::script('https://maps.googleapis.com/maps/api/js?v=3.exp') }}
{{ HTML::script('js/search/search-gmaps.js') }}
