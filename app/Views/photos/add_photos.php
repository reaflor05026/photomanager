<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="jumbotron">
				<h1>Adding photos to your album is easy just click the button below</h1>
				<form action="../save_photos" method="POST" enctype="multipart/form-data" >
	                <input required type="file" name="image[]" multiple="true" accept="image/x-png,image/jpg,image/jpeg" >
	                <input type="hidden" name="album_id" value="<?= $album_id ?>" required>

                    <button type="submit" class="btn btn-primary">Create Now</button>
				</form>
			</div>
		</div>
	</div>
</div>