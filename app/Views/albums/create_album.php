<div class="container">
  <div class="row pt-5">
  	<div class="col-md-4"></div>
  	<div class="col-md-4">
  		<div class="my-form-header"><h2>Create Album</h2></div>
  		   <div class="my-login-form-container">
                  <form action="create_album" method="POST" enctype="multipart/form-data" >
                  <div class="form-group">
                        <label for="username">Album Title</label>
                        <input required type="text" class="form-control" id="title" name="title">
                  </div>
                     <button type="submit" class="btn btn-primary">Create Now</button> | <a href="<?= base_url().'photomanager/public/albums' ?>">Back to dashboard </a>
                  </form>
                </div>
  	</div>
  </div>
<style type="text/css">
  .my-login-form-container {
    background: #8c7ae6;
    /*height: 300px;*/
    width: 100%;
    display: block;
/*    border-radius: 15px;*/
    padding: 15px;
  }
  .my-login-form-container label {
  	color:#fff;
  	font-weight: 500;
  }
  .my-login-form-container a {
  	color:#fff;
  	font-weight: 550;
  	text-decoration: none;
  }
  .my-form-header {
  	background-color: #8e44ad;
  	text-align: left;
  	padding:10px;
  }
  .my-form-header h2 {
  	margin: 0 !important;
  	color: #fff;
  	font-weight: 550;

  }
</style>
</div>