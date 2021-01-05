
<?php require "database.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>ACT | GALLERY</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<a href=""><img style="padding: 15px" src="" alt="logo"></a>
				</div>
				<div class="col-md-6">
					<nav class="navbar navbar-expand-sm">
						<ul class="navbar-nav">
							<li class="nav-item"><a class="nav-link" href="index.php">HOME</a></li>
							<li class="nav-item"><a class="nav-link" href="about.php">ABOUT</a></li>
							<li class="nav-item"><a class="nav-link" href="info.php">INFO</a></li>
							<li class="nav-item"><a class="nav-link" href="events.php">EVENTS</a></li>
							<li class="nav-item"><a class="nav-link" href="discography.php">DISCOGRAPHY</a></li>
							<li class="nav-item"><a class="nav-link" href="gallery.php">GALLERY</a></li>
						</ul>		
					</nav>
				</div>
				<div class="col-md-3">
					<!--font owesome-->
				</div>	
			</div>	
		</div>
		<div style="background-image: url('admin/images/no_event.jpg'); height: 200px; width: 100%;">
			<h1 class="text-center" style="padding:100px; color: white;">GALLERY</h1>
		</div>	
	</header>

	<section>
		<div class="container text-center gal-img-size">

		<?php $img=database("SELECT img_name FROM data_contents WHERE reference='gallery'");

		if (count($img)==0) { ?>

			<div>
				<p>Gallery empty</p>
			</div>

		<?php } 

		else { ?>

			<div class="row">
		
		 		<?php

					$i=0;

					while ($i<count($img) and $i<10) { ?>

						<div class="col-md-4">
							<img <?php echo 'src="admin/images/'.$img[$i]["img_name"].'"';?> alt="img">	
						</div>

					<?php

						$i++;
					} ?>
			</div>

		<?php } ?>

		</div>
	</section>

	<footer>
		<br>
		<div class="container">
			<p class="text-center">Copyright ariel wa lunda @2019</p>
		</div>
	</footer>

	<script>
		if ( window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
		}
	</script>




</body>
</html>