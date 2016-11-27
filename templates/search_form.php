        <div id="search_form">
			<form action="database/search_restaurant.php" method="get">
				<label>SEARCH FOR<input type="text" name="search_field"></label>
				<label>MINIMUM RATING<input type="range" name="minimum_rating" min="0" max="10"></label>
				<label>LOCAL<input type="text" name="local"></label>
				<label>OWNER<input type="text" name="owner"></label>
				<input type="submit" value="Search">
			</form>
		</div>