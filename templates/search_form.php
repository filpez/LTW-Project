        <div id="search_form">
			<form action="database/search_restaurant.php" method="get">
				<label>SEARCH FOR<input type="text" id="search_field" name="search_field"></label>
				<label>MINIMUM RATING: <span id="minimum_rating_value">0</span><input type="range" id="minimum_rating" name="minimum_rating" value="0" min="0" max="10"></label>
				<label>LOCAL<input type="text" name="local"></label>
				<label>OWNER<input type="text" name="owner"></label>
				<input type="submit" id="search_button" value="Search">
			</form>
		</div>
		<div id="search_results">
			<ul id="results">
			</ul>
		</div>