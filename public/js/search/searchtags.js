//search on keyup
$("input#omnibox").on('keyup', function(){

	//set search string
	var search_string = $(this).val();

	//console.log(search_string);

	//post search
	if(search_string !==''){
		$.ajax({
			type: 'GET',
			url: 'http://localhost/shimiya/public/search',
			data: search_string,
			success: function(data){

				//do something
				console.log(data);

				$('#search-results').text(data);
				
			}
		});

	} else {
		$('#search-results').text('');
	}
	
});