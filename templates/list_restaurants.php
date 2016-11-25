<?php
	include_once('database/connection.php');

	function getAllRestaurants() {
		global $db;
		$stmt = $db->prepare('SELECT * FROM restaurant');
  		$stmt->execute();
  		$result = $stmt->fetchAll();
  		return $result;
	}

	$restaurants = getAllRestaurants();
?>

<?php foreach($restaurants as $restaurant) { ?>
	<div id="content">
		<div class="restaurant">
				<?php echo "<h3>".$restaurant['name']."</h3>" ?>
				<img src="http://ipsumimage.appspot.com/300x200,ff7700" alt="300x200">
				<p class="points">Pontos: X em X</p>
				<?php echo "<p class=\"place\">".$restaurant['local']."</p>" ?>
				<p class="introduction">Um belo sitio, onde pode comer todo o tipo de Pidgey a um otimo preço.</p>
				<ul>
					<li><a href="">see more</a></li>
					<li><a href="">reviews (2)</a></li>
				</ul>
			</div>
<?php } ?>

			<!--<div class="restaurant">
				<h3>Krusty Krabby</h3>
				<img src="http://ipsumimage.appspot.com/300x200,ff7700" alt="300x200">
				<p class="points">Pontos: 8 em 10</p>
				<p class="place">Cerulean City, 95, Kanto</p>
				<p class="introduction">O melhor Krabby do Mercado!!!</p>
				<ul>
					<li><a href="">see more</a></li>
					<li><a href="">reviews (3)</a></li>
				</ul>
			</div>

			<div class="restaurant">
				<h3>McGolduck's</h3>
				<img src="http://ipsumimage.appspot.com/300x200,ff7700" alt="300x200">
				<p class="points">Pontos: 11 em 10</p>
				<p class="place">Safari Zone, Kanto</p>
				<p class="introduction">Não é McDonald's.</p>
				<ul>
					<li><a href="">see more</a></li>
					<li><a href="">reviews (39142104)</a></li>
				</ul>
			</div>
		</div>-->