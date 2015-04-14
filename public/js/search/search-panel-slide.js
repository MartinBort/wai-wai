$(document).ready(function() {

	/*---
	PANEL ANIMATION FUNCTIONALITY
	---*/

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

		//empty any input text when panel is closed
		$('#searchBox').val('');
		$('#searchResults').empty();
	});

	/*---
	SEARCH BY... TOGGLE
	---*/
	var searchbySpots = $('#searchbySpots');
	var searchbyTags = $('#searchbyTags');

	$('#searchbySpots').click(function(){

		searchbySpots.removeClass('searchby-off');
		searchbySpots.addClass('searchby-active');
		searchbyTags.removeClass('searchby-active');
		searchbyTags.addClass('searchby-off');

		//change placeholder text
		$('#searchBox').attr("placeholder", "Search by spot name...");
	});

	$('#searchbyTags').click(function(){

		searchbyTags.removeClass('searchby-off');
		searchbyTags.addClass('searchby-active');
		searchbySpots.removeClass('searchby-active');
		searchbySpots.addClass('searchby-off');

		//change placeholder text
		$('#searchBox').attr("placeholder", "Search for tags...");
	});

});