
<?php require "database.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ACT | ABOUT</title>

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
			<h1 class="text-center" style="padding:100px; color: white;">ABOUT PAGE</h1>
		</div>			
	</header>

	<section>
		<div class="container">
			<div class="pad-frame">

				<?php $text=database("r", "SELECT id, title, paragraphe FROM data_contents WHERE page='about'");

				if(count($text)==0) { ?>
					<p class="text-center">No text about the act</p>
					<div style="padding:20px; text-align: center;">
						<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddModal">ADD TEXT</button>
					</div>
				<?php
				}

				else { ?>

					<div>
						<h3><?php echo (strtoupper($text[0]['title']));?></h3>
						<p class="text-justify">
							<?php echo ($text[0]['paragraphe']);?>
						</p>					
					</div>
					<div class="text-center">
						<form method="POST" action="">
							<input class="btn btn-danger" <?php echo 'name=aboutdel';?> type="submit" value ="Delete">
							<input class="btn btn-primary" <?php echo 'name="aboutu"';?> type="submit" value ="Update">
						</form>
					</div>

				<?php } ?>	

			</div>
		</div>
	</section>

	
	<footer>
		<br>
		<div class="container">
			<p class="text-center">Copyright ariel wa lunda @2019</p>
		</div>
	</footer>

	<div class="modal" id="AddModal">
		<div class="modal-dialog">
    		<div class="modal-content">
    			<!-- Modal Header -->
    			<div class="modal-header">
    				<h4 class="modal-title">ADD TEXT</h4>
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    			</div>
    			<!-- Modal body -->
    			<form method="post" action="" enctype="multipart/form-data">
    				<div class="modal-body">
    					<div>
    						<label>Text Title: </label><br>
    						<input type="text" name="about_title">
    					</div>
    					<div>
    						<label>Text Brief</label><br>
    						<textarea name="textBrief" id="message" required="required" class="form-control" rows="8"></textarea>
    					</div>
      				</div>
      			<!-- Modal footer -->
	      			<div class="modal-footer">
	      				<button type="submit" class="btn btn-primary" name="add">ADD</button>
	        			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      			</div>
	      		</form>
      		</div>
      	</div>
    </div>

	<?php

	//ADD

	if (isset($_POST['add'])) {

		$title=$_POST['about_title'];
		$paragraphe=$_POST['textBrief'];
		
		database("", "INSERT INTO data_contents (page, title, paragraphe) VALUES ('about', '".$title."', '".$paragraphe."')");
		
		echo "<meta http-equiv='refresh' content='0'>";
	}

	//DELETE
	if (isset($_POST['aboutdel'])) {
		database("", "DELETE FROM data_contents WHERE id=".$text[0]["id"]);
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