/*
		when radio button changes, change the POST value in form (POST to either 'tag-search' or 'user-search')
*/

//radio button toggle
$("input[name='for']").change(radioValueChanged);

function radioValueChanged() {

	if($('#tagRadio').is(':checked')) {

		$('#omnibox').attr('placeholder', 'search for tags');


			/*
			//focus
			$('#omniboxWrap, #omnibox, #whereOption').focus(function() {
				$('#tagOptions').slideDown();
				e.stopPropagation();

			});

			$('#omniboxWrap, #omnibox, #whereOption').focusout(function() {
						$('#tagOptions').slideUp();
						e.stopPropagation();

			});
			*/


	} else {

			$('#omnibox').attr('placeholder', 'search for other users');
	}

}