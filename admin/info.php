
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
			<h1 class="text-center" style="padding:100px; color: white;">NEWS</h1>
		</div>	
	</header>

	<section>

		<?php $info=database("r", "SELECT id, title, img_name, paragraphe FROM data_contents WHERE page='info'");?>
		
		<div class="container">
			<div class="img1-size">
				<?php 
					if (count($info)==0) {?>

						<div class="text-center">
							<h3>No information about the act</h3>
						</div>
						<div style="padding:20px; text-align: center;">
							<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddModal">ADD NEW INFO</button>
						</div>

				<?php }
					else {
						$i=0;
						while ($i<count($info) and $i<6) { ?>
						<div class="row">
							<div class="col-md-5">
								<img <?php echo 'src="images/'.$info[$i]['img_name'].'"'?> alt="img">
							</div>
							<div class="col-md-7 text-justify pad-frame">
								<h3><?php echo ($info[$i]['title']);?></h3>
								<p><?php echo ($info[$i]['paragraphe']);?></p>
								<div class="text-center">
									<form method="POST" action="">
										<input class="btn btn-danger" <?php echo 'name="delinfo'.$i.'"';?> type="submit" value ="Delete">
										<input class="btn btn-primary" <?php echo 'name="event"';?> type="submit" value ="Update">
									</form>
								</div>
							</div>
						</div>
					<?php 
							$i++; 
						}

					if($i<5) { ?>

						<div class="text-center">
							<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddModal">NEW INFO</button>
						</div>

					<?php }
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

	<div class="modal" id="AddModal">
		<div class="modal-dialog">
    		<div class="modal-content">
    			<!-- Modal Header -->
    			<div class="modal-header">
    				<h4 class="modal-title">ADD NEW INFO</h4>
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    			</div>
    			<!-- Modal body -->
    			<form method="post" action="" enctype="multipart/form-data">
    				<div class="modal-body">
    					<div>
    						<label>Info Title: </label><br>
    						<input type="text" name="Event2_title">
    					</div>
    					<div>
    						<label>Image:</label><br>
    						<input type="file" name="file2">
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

		$img_tilte=$_POST['Event2_title'];
		$img_brief=$_POST['textBrief'];

		$file=$_FILES['file2'];
		$img_name=$_FILES['file2']['name'];
		$img_tmp_loc=$_FILES['file2']['tmp_name'];

		$img_ext=explode('.', $img_name);
		$ext=strtolower(end($img_ext));
		$ext_allowed=array('jpg', 'jpeg', 'png');

		if (in_array($ext, $ext_allowed)) {
			$file_name=uniqid('', true).".".$ext;
			$file_dest="images/".$file_name;
			move_uploaded_file($img_tmp_loc, $file_dest);
			database("", "INSERT INTO data_contents (page, title, img_name, paragraphe) VALUES ('info', '".$img_tilte."', '".$file_name."', '".$img_brief."')");
		}		
		
		echo "<meta http-equiv='refresh' content='0'>";
	}

	//DELETE

	if (isset($_POST['delinfo0'])) {
		database("", "DELETE FROM data_contents WHERE id=".$info[0]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";
	}

	if (isset($_POST['delinfo1'])) {
		database("", "DELETE FROM data_contents WHERE id=".$info[1]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['delinfo2'])) {
		database("", "DELETE FROM data_contents WHERE id=".$info[2]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['delinfo3'])) {
		database("", "DELETE FROM data_contents WHERE id=".$info[3]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['delinfo4'])) {
		database("", "DELETE FROM data_contents WHERE id=".$info[4]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['delinfo5'])) {
		database("", "DELETE FROM data_contents WHERE id=".$info[5]["id"]);
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