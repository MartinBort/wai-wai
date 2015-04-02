//live search on keyup
$('input#searchBox').on('keyup', function(){

	//set search string
	var search_query = $('#searchBox').val();

	if(search_query !== ''){		

		$.ajax({
			type: 'GET',
			url: 'http://localhost/shimiya/public/search',
			data: {query: search_query},
			success: function(data){

				data = $.parseJSON(data); //turn string to JSON

				$('#searchResults').empty(); //empty target div before appending

				//loop through each result
				$.each(data, function(spots,spot) {
					returnTag = '<h2 class="tagInstance">'+spot.tag_name+'</h2>'
					$('#searchResults').append(returnTag);
				}); 
				
			} //end success
		});//end ajax

	} else { $('#searchResults').empty(); };

}); //end onkeyup


