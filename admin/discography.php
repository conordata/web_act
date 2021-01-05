
<?php require "database.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ACT | DISCOGRAPHY</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
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
			<h1 class="text-center" style="padding:100px; color: white;">DISCOGRAPHY</h1>
		</div>	
	</header>

	<section>
		<div class="text-center">
			<h3>RECORDS CATALOGUE</h3><br>
		</div>

		<?php $rec=database("r", "SELECT * FROM records WHERE 1");

			if (count($rec)<11) { ?>
			<div class="text-center">
				<form method="POST" action="">
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<label>Record Title: </label><br>
								<input type="text" name="disc_title">	
							</div>
							<div class="col-md-3">
								<label>Release Date: </label><br>
								<input type="date" name="disc_date">	
							</div>
							<div class="col-md-3">
								<label>Album: </label><br>
								<input type="text" name="disc_album">	
							</div>
							<div class="col-md-3">
								<br><br>
								<input style="float: right;" type="submit" name="add_rec" value="ADD RECORD">	
							</div>
						</div>
					</div>
				</form><br>
			</div>
		<?php } ?>

		<div class="container">
			<table class="table">
				<tr>
					<th>TITLE</th>
					<th>RELEASE DATE</th>
					<th>ALBUM</th>
				</tr>

				<?php 

				if (count($rec)==0) { ?>

					<tr>
						<td>Empty</td>
						<td>Empty</td>
						<td>Empty</td>
					</tr>

				<?php }

				else {

					$i=0;
					while ($i<count($rec)) { ?>
						<tr>
							<td><a href=""><?php echo ($rec[$i]["title"]);?></a></td>
							<td><?php echo ($rec[$i]["date_ev"]);?></td>
							<td><?php echo ($rec[$i]["album"]);?></td>
							<td>
								<form style="float: right;" method="POST" action="">
									<input <?php echo 'name="deldisc'.$i.'"';?> type="submit" value ="Delete">
									<input name="event" type="submit" value ="Update">
								</form>
							</td>
						</tr>
				<?php 
						$i++;
					}
				}

				?>
				
			</table>
			
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

		$title=$_POST['disc_title'];
		$date=$_POST['disc_date'];
		$album=$_POST['disc_album'];
		
		database("", "INSERT INTO records (title, date_ev, album) VALUES ('".$title."', '".$date."', '".$album."')");
		
		echo "<meta http-equiv='refresh' content='0'>";
	}

	//DELETE

	if (isset($_POST['deldisc0'])) {
		database("", "DELETE FROM records WHERE id=".$rec[0]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['deldisc1'])) {
		database("", "DELETE FROM records WHERE id=".$rec[1]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['deldisc2'])) {
		database("", "DELETE FROM records WHERE id=".$rec[2]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['deldisc3'])) {
		database("", "DELETE FROM records WHERE id=".$rec[3]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['deldisc4'])) {
		database("", "DELETE FROM records WHERE id=".$rec[4]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['deldisc5'])) {
		database("", "DELETE FROM records WHERE id=".$rec[5]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['deldisc6'])) {
		database("", "DELETE FROM records WHERE id=".$rec[6]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['deldisc7'])) {
		database("", "DELETE FROM records WHERE id=".$rec[7]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['deldisc8'])) {
		database("", "DELETE FROM records WHERE id=".$rec[8]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['deldisc9'])) {
		database("", "DELETE FROM records WHERE id=".$rec[9]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['deldisc10'])) {
		database("", "DELETE FROM records WHERE id=".$rec[10]["id"]);
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