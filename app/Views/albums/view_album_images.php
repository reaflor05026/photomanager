 <?php if (isset($success_message)): ?>
 	<h1><?= $success_message ?></h1>
 <?php endif ?>

 <div class="container">
 	<h1>Photos for album <?= $album['title'] ?></h1>
 	<div class="row pt-5">
 			<?php foreach ($photos as $photo): ?>
 				<div class="col-lg-4" style="margin-bottom: 1rem;">
	 				<div class="card" style="width: 100%;">
					  <img src="<?= base_url().'photomanager/public/uploads/'. $photo['image'] ?>" class="card-img-top" alt="">
					    <div class="card-body">
						    <a href="<?= base_url().'photomanager/public/photos/delete_photo/'. $photo['id'] ?>" class="card-link">Delete photo</a>
						    <!-- <a href="#" class="card-link">Another link</a> -->
						    <!-- < base_url().'photomanager/public/users/user_logout' ?> -->
						 </div>
	 				</div>
 				</div>		
 			<?php endforeach ?>
 </div>

	<div class="row" style="margin: 1rem 0;">	
	 		<div class="col-lg-8">
			 	<form action="../../photos/save_photos" method="POST" enctype="multipart/form-data" >
			 		<h6>Add new photos by clicking the browse button and select images then press 'Add Now' button</h6>
				         <input required type="file" name="image[]" multiple="true" accept="image/x-png,image/jpg,image/jpeg" >
				         <input type="hidden" name="album_id" value="<?= $album['id'] ?>" required>
			 	
			             <button type="submit" class="btn btn-primary">Add Now</button>	
			    </form>
	 		</div>
	 </div>

	