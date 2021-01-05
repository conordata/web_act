
<?php require "database.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ACT | INFO</title>

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
			<h1 class="text-center" style="padding:100px; color: white;">NEWS</h1>
		</div>	
	</header>

	<section>

		<?php $info=database("SELECT title, img_name, paragraphe FROM data_contents WHERE page='info'");?>
		
		<div class="container">
			<div class="img1-size">
				<?php 
					if (count($info)==0) {?>
						<div class="text-center">
							<h3>No information about the act</h3>
						</div>
				<?php }
					else {
						$i=0;
						while ($i<count($info)) { ?>
						<div class="row">
							<div class="col-md-5">
								<img <?php echo 'src="admin/images/'.$info[$i]['img_name'].'"'?> alt="img">
							</div>
							<div class="col-md-7 text-justify pad-frame">
								<h3><?php echo ($info[$i]['title']);?></h3>
								<p><?php echo ($info[$i]['paragraphe']);?></p>
							</div>
						</div>
					<?php $i++; 
						}
				} ?>
			</div>
		</div>
	</section>

	
	<footer>
		<br>
		<div class="container">
			<p class="text-center">Copyright ariel wa lunda @2019</p>
		</div>
	</footer>



</body>
</html>