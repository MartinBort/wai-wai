<form id="searchForm" action="{{ URL::route('search-tags') }}" method="GET">
	<div id="omniboxWrap">
		<p><label for="omnibox"><i>Search </i></label>
			<input type="text" id="omnibox" name="search-term" placeholder="search for tags">

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
<div id="search-results"></div>
<hr>
{{ HTML::script('js/search/searchtags.js') }}
{{ HTML::script('js/search/omnibox.js') }}
