$(document).ready(function() {

	/*open menu*/
	$('#menuBtn').click(function(){
		if(!$(this).is(':animated')) //stop multiple clicks
		{
			$('#menuPanel').animate({'margin-right': '+=80%'}, 200);
			$('#mapMask').css("z-index", 2);
		}
	});

	/*close menu panel*/
	$('#closeMenuPanel, #mapMask').click(function(){
		$('#menuPanel').animate({'margin-right': '-=80%'}, 200);
		$('#mapMask').css("z-index", -1);
	});

});