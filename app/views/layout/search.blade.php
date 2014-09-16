<form id="searchForm" method="get">
	<div id="omniboxWrap">
		<p><label for="omnibox"><i>Search </i></label>
			<input type="text" id="name" name="name" placeholder="search for tags"> <!-- id was 'omnibox' -->

			<button class="btnSearch">Go</button>

			<input type="radio" name="for" id="tagRadio" checked="checked"><label for="tagRadio">Tags</label>
			<input type="radio" name="for" id="usersRadio"><label for="usersRadio">Users</label>

			<!--
			<div id="tagOptions" style="display:none;">
				<i>Where: </i><input type="text" id="whereOption" placeholder="e.g Shinjuku" >
			</div>
			-->
		</p>
    </div>
</form>
<hr>
{{ HTML::script('js/jquery-1.11.1.min.js') }}
{{ HTML::script('js/omnibox.js') }}
