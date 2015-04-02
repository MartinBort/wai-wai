$(document).ready(function() {

	$('#searchPanel').hide();

	/*open menu*/
	$('#searchBtn').click(function(){
		if(!$(this).is(':animated')) //stop multiple clicks
		{
			$('#searchPanel').slideDown('fast');
		}
	});

	/*close menu panel*/
	$('#closeSearchPanel').click(function(){
		$('#searchPanel').slideUp('fast');
		//empty any input text
		$('#searchBox').val('');
		$('#searchResults').empty();
	});

});