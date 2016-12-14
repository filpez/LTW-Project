<div class="manage_restaurant">
	<form action="database/editRestaurant.php" enctype="multipart/form-data" method="post">
		<input type="hidden" name="res_id" value="<?=$_GET['id']?>">
		<label>NAME<input name="name" type="text" value="<?=$restaurant['name']?>" ></label>
		<label>LOCAL<input name="local" type="text" value="<?=$restaurant['local']?>"></label>
		<label>DESCRIPTION<textarea name="description" rows="7" cols="50"><?=$restaurant['description']?></textarea >
		<label>OPENING HOURS<input name="opening" type="time" value="<?=$restaurant['opening_hours']?>"></label>
		<label>CLOSING HOURS<input name="closing" type="time" value="<?=$restaurant['closing_hours']?>"></label>
		<input id="save" type="submit" value="Save">
	</form>
</div>
<div class="manage_restaurant">
	<form id="addPhotoForm" action="database/addImage.php" enctype="multipart/form-data" method="post">
		<input type="hidden" name="id" value="<?=$restaurant['id']?>">
		<label>ADD IMAGE<input id="photo" name="photo" type="file"></label>
		<input type="submit" id="addPhotoBtn" value="Add">
	</form>
</div>
<div class="manage_restaurant">
	<p>DELETE IMAGE</p>
	<?php if (count($images)) { ?>
	<div id="image_gallery">
		<?php 
			foreach ($images as $image){
				$image_path = $image["img_path"];
				echo '<img class="photo" src="database/uploads/'.$image_path.'" alt="300x200">';
			}
		?>
	</div>

	<div id="modal">
		<span class="close">×</span>
		<span class="left_arrow">&#060</span>
		<span class="right_arrow">&#062</span>
		<span class="delete">Delete</span>
  		<img src="" class="modal_image">
	</div>
	<?php } ?>
</div>
<div class="manage_restaurant">
	<button id="delete_all" type="button">Delete this restaurant!</button>
</div>