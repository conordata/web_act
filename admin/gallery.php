
<?php require "database.php" ?>

<!DOCTYPE html>
<html lang="en">
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
		<div style="background-image: url('images/no_event.jpg'); height: 200px; width: 100%;">
			<h1 class="text-center" style="padding:100px; color: white;">GALLERY</h1>
		</div>	
	</header>

	<section>

		<?php $img=database("r", "SELECT * FROM data_contents WHERE reference='gallery'");

			if (count($img)<9) { ?>
			<div class="text-center">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="container">
						<div>
	    					<label>Image:</label><br>
	    					<input type="file" name="disc_title">
	      				</div>
						<div class="text-center">
							<br>
							<input type="submit" name="add_rec" value="ADD IMAGE">	
						</div>
					</div>
				</form><br>
			</div>
		<?php } ?>

		<div class="container text-center gal-img-size">

		<?php

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
							<img style="width: 100%; height: 300px; padding: 15px;" <?php echo 'src="images/'.$img[$i]["img_name"].'"';?> alt="img">
							<div>
								<form method="POST" action="">
									<input class="btn btn-danger" <?php echo 'name="gallery'.$i.'"';?> type="submit" value ="Delete">
									<input class="btn btn-primary" <?php echo 'name="gallery"';?> type="submit" value ="Update">
								</form>
							</div>	
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

	<?php

	//ADD

	if (isset($_POST['add_rec'])) {

		$file=$_FILES['disc_title'];
		$img_name=$_FILES['disc_title']['name'];
		$img_tmp_loc=$_FILES['disc_title']['tmp_name'];

		$img_ext=explode('.', $img_name);
		$ext=strtolower(end($img_ext));
		$ext_allowed=array('jpg', 'jpeg', 'png');

		if (in_array($ext, $ext_allowed)) {
			$file_name=uniqid('', true).".".$ext;
			$file_dest="images/".$file_name;
			move_uploaded_file($img_tmp_loc, $file_dest);
			database("", "INSERT INTO data_contents (reference, img_name) VALUES ('gallery', '".$file_name."')");
		}
		
		echo "<meta http-equiv='refresh' content='0'>";
	}

	//DELETE

	if (isset($_POST['gallery0'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img[0]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	if (isset($_POST['gallery1'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img[1]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	if (isset($_POST['gallery2'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img[2]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	if (isset($_POST['gallery3'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img[3]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	if (isset($_POST['gallery4'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img[4]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	if (isset($_POST['gallery5'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img[5]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	if (isset($_POST['gallery6'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img[6]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	if (isset($_POST['gallery7'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img[7]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	if (isset($_POST['gallery8'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img[8]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	?>

	<script>
		if ( window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
		}
	</script>


</body>
</html>