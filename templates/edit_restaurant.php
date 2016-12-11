<div id="manage_restaurant">
	<form action="database/editRestaurant.php" enctype="multipart/form-data" method="post">
		<input type="hidden" name="res_id" value="<?=$_GET['id']?>">
		<label>NAME<input name="name" type="text" value="<?=$restaurant['name']?>" ></label>
		<label>LOCAL<input name="local" type="text" value="<?=$restaurant['local']?>"></label>
		<label>DESCRIPTION<textarea name="description" rows="7" cols="50"><?=$restaurant['description']?></textarea >
		<label>OPENING HOURS<input name="opening" type="time" value="<?=$restaurant['opening_hours']?>"></label>
		<label>CLOSING HOURS<input name="closing" type="time" value="<?=$restaurant['closing_hours']?>"></label>
		<input type="submit" value="Save">
	</form>
	
	<form action="database/addImage.php" enctype="multipart/form-data" method="post">
		<input type="hidden" name="name" value="<?=$restaurant['name']?>">
		<label>ADD IMAGE<input id="photo" name="photo" type="file"></label>
		<input type="submit" id="addPhotoBtn" value="Add">
	</form>

	<form action="database/addPhoto.php" enctype="multipart/form-data" method="post">
		<label>DELETE IMAGE</label>
		<?php 
			$images = getImagesForRestaurant($restaurant['id']);
			foreach ($images as $image){
				$image_path = $image["img_path"];
				echo "<p>".$image_path."</p>";
			}
		?>
	</form>

</div>
