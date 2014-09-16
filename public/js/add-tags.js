//global array for tags
window.tag_array = [];
window.i=0;

$('#showArr').on('click', function(){
  alert(tag_array);
})

$( "#addtag" ).click(function() {

	var tag = $("#input-tag").val();

	//if tag is empty
	if(!$('#input-tag').val()) {

		alert("can't be empty");
				
		} else {
			//put tag.val into an array
			tag_array.push(tag);
			i=i+1;

			//get user id
			var user_id = $('#user_id').val();

			//add to DOM
			$("#tagsbox")
			.append("<div class='displaytag'><i>"+tag+"</i><input type='hidden' name='tags["+i+"][user_id]' value="+user_id+"><input type='hidden' name='tags["+i+"][tag_name]'value="+tag+"><button onClick='return false;' class='removetag'>x</button></div>")

			//reset value in text area to null
			$("#input-tag").val("");

				//remove tag functionality
				$('.removetag').click(function(e) {

		        	e.stopImmediatePropagation();
		          	var elm = $(this).parent().text().substr(0, $(this).parent().text().length-1);
							  
					//splice from array
		          	tag_array.splice(tag_array.indexOf(elm),1);

		          	//remove tag from DOM
		          	$(this).parent().remove(); 

				});


		} //end else
});