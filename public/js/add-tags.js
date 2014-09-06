//Add tags
$( "#addtag" ).click(function() {

		 var tag = $("#input-tag").val();

		 if(!$('#input-tag').val()) {

		  alert("can't be empty");
				
			} else {

				$( "#tagsbox" )
				.append( "<div class='displaytag'><i>"+tag+"</i><input type='hidden' class='tag' value="+tag+"><button onClick='return false;' class='removetag'>x</button></div>" );

				//reset value in text area to null
				$("#input-tag").val("");

				$('.removetag').click(function() {
					$(this).parent().remove();
				});
			}

		});