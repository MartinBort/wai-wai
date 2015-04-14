//live search on keyup
$('input#searchBox').on('keyup', function(){

	//set search string
	var search_query = $('#searchBox').val();

	//check which searchby button is active
	if ($('#searchbyTags').hasClass('searchby-active')){

		//check query is not empty string
		if(search_query !== ''){		

			$.ajax({
				type: 'GET',
				url: 'http://localhost/shimiya/public/search/tags',
				//url: 'http://waiwai.space/search/tags',
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

	} else { //else if searchbyTags doesn't have class 'searchby-active'

		//ajax request to search/spots
		//check query is not empty string
		if(search_query !== ''){		

			$.ajax({
				type: 'GET',
				url: 'http://localhost/shimiya/public/search/spots',
				//url: 'http://waiwai.space/search/spots',
				data: {query: search_query},
				success: function(data){

					data = $.parseJSON(data); //turn string to JSON

					$('#searchResults').empty(); //empty target div before appending

					//loop through each result
					$.each(data, function(spots,spot) {
						returnTag = '<h2 class="tagInstance">'+spot.spot_name+'</h2>'
						$('#searchResults').append(returnTag);
					}); 
					
				} //end success
			});//end ajax

		} else { $('#searchResults').empty(); };
	}

	

}); //end onkeyup


