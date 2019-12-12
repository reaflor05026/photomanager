<div class="container">
	<?php if (empty($albums)): ?>	
		<div class="jumbotron" style="background-color: rgba(214, 162, 232,1.0);">
			<h1>Start managing your photos now</h1>
			<a href="<?= base_url().'photomanager/public/create_album' ?>" class="btn btn-outline-success btn-lg">Create First Album</a>
		</div>
	<?php else: ?>
	<div class="my-header">
	<h3>Hi <?= session()->name ?> here's a list of your album/s and latest images</h3></div>
		<div class="row pt-5">
			<div class="col-lg-4">
				<div class="list-group">
					<div class="list-group-item active">Album lists</div>
					<?php foreach ($albums as $album): ?>
						<a href="<?= base_url().'photomanager/public/albums/view_images/'. $album['id'] ?>" class="list-group-item list-group-item-action"><?= $album['title'] ?></a>
					<?php endforeach ?>
					<!-- /photomanager/public/albums/view_images/'.$album_id -->
				</div>
			</div>
			<div class="col-lg-8">
				<div class="row">
				<?php foreach ($photos as $photo): ?>				
					<div class="col-lg-6" style="margin-bottom: 1rem;">
		 				<div class="card" style="width: 100%;">
						  <img src="<?= base_url().'photomanager/public/uploads/'. $photo['image'] ?>" class="card-img-top" alt="">
						    <div class="card-body">
							    <a href="<?= base_url().'photomanager/public/photos/delete_photo/'. $photo['id'] ?>" class="card-link">Delete photo</a>
							 </div>
		 				</div>
	 				</div>	
				<?php endforeach ?>
				</div>
			</div>
		</div>
	<?php endif ?>
</div>