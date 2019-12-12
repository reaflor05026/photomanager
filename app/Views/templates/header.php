<!doctype html>
<html>
<head>
        <title>My Photo Manager</title>

		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <style type="text/css">
        	body {
        		margin: 0;
        		padding: 0;
        		overflow-x:hidden; 
        	}
        </style>
</head>
<body>
		<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #8e44ad;">
		  <a class="navbar-brand" href="<?= base_url(). 'myevents/public' ?>">My Photo Manager</a>

		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">	
		      <?php if (session()->logged_in): ?>
		      <li class="nav-item">
		        <a class="nav-link" href="<?= base_url().'photomanager/public/albums' ?>">Dashboard <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?= base_url().'photomanager/public/create_album' ?>">New album</a>
		      </li>
		      <li class="nav-item">
		         <a class="nav-link" href="<?= base_url().'photomanager/public/users/user_logout' ?>">Logout</a>
		      </li>

		      <?php endif ?>
		    </ul>
		  </div>
		</nav>
		<div class="row">
			<div class="col-lg-4"></div>

			<div class="col-lg-4"><h1 style="margin:35px 0;"></h1></div>
		</div>