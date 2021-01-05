
<?php require "database.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ACT | Home</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- core script -->

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
							<li class="nav-item"><a class="nav-link" href="envent.php">EVENTS</a></li>
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
		<div>
			<?php 

			$img=database("r", "SELECT img_name FROM data_contents WHERE page='home' and reference='head'");?>
			<img style='width: 100%; height: 700px;' <?php echo "src='images/0.jpg'";?> alt='img'>
			
		</div>	
	</header>

	<section>
		<div class="text-center">
			<h2>LATEST NEWS</h2>
		</div>

		<div class="text-center img-size">
			<div class="container">

				<?php 

					$img1=database("r", "SELECT id, img_name, title FROM data_contents WHERE page='home' and reference='event'");

					if(count($img1)==0) { ?>

						<div style="background-image: url('images/no_event.jpg'); height: 210px">
							<h3 class="text-center" style="padding-top:60px; color: white;">NO RECENT EVENTS POSTED ON PUBLIC WEBSITE</h3>

							<div style="padding:20px">
								<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddModal1">ADD NEW</button>
							</div>
						</div>
				
					<?php }

					else { ?>
						<div class="row">
							<?php

							$i=0;
							while ($i<4) {

								if ($i<count($img1)) {?>
									<div class="col-md-3">
										<img <?php echo 'src="images/'.$img1[$i]["img_name"].'"';?> alt="img">
										<div>
											<p><?php echo (strtoupper($img1[$i]["title"]));?></p>
										</div>
										<div>
											<form method="POST" action="">
												<input class="btn btn-danger" <?php echo 'name="event'.$i.'"';?> type="submit" value ="Delete">
												<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddModal4">Update</button>
											</form>
										</div>
									</div>

								<?php }

								else {?>
									<div class="col-md-3">
										<div style="padding-top:80px">
											<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddModal1">ADD NEW</button>
										</div>
									</div>

									<?php break;
								}
							$i++;						
						}?>	

						</div>

					<?php } ?>
			</div>
		</div>

	</section>

	<section>
		<div class="container">
			<div class="row img1-size">
				<div class="col-md-8 pad-frame text-justify">
					<div class="text-center">
						<h2>UPCOMING EVENTS</h2>
					</div>

					<?php

						$img2=database("r", "SELECT id, img_name, title, paragraphe FROM data_contents WHERE page='home' and reference='event1'");

						if(count($img2)==0) { ?>

							<div style="background-image: url('images/no_event.jpg'); height: 360px">
								<h3 class="text-center" style="padding-top:150px; color: white;">NO FUTURE EVENT POSTED ON PUBLIC WEBSITE</h3>

								<div class="text-center" style="padding-top:55px">
									<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddModal2">ADD NEW</button>
								</div>
							</div>
					
					<?php }

						else {

							$i=0;
							while ($i<(count($img2)+1) and $i<2) {

								if($i<count($img2)) { ?>
							
									<div>
										<img <?php echo 'src="images/'.$img2[$i]["img_name"].'"';?> alt="img">
										<div>
											<a href=""><h3><?php echo (strtoupper($img2[$i]["title"]));?></h3></a>
											<p><?php echo ($img2[$i]["paragraphe"]);?></p>
										</div>
									</div>
									<div class="text-center">
										<form method="POST" action="">
											<input class="btn btn-danger" <?php echo 'name="event1'.$i.'"';?> type="submit" value ="Delete">
											<input class="btn btn-primary" name="event1" type="submit" value ="Update">
										</form>
									</div>

								<?php

									$i++;
								}
								else { ?>
									
									<div class="text-center" style="padding-top:55px">
										<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddModal2">ADD NEW</button>
									</div>

								<?php 
									break;
								}	
							}
						}
					?>						
				</div>

				<div class="col-md-4 text-center">
					<div class="div-right">
						<div>
							<h3>LATEST CLIP</h3><br>
						</div>
						<div>
							<iframe width="300" height="240" src="https://www.youtube.com/embed/pMfFQgVybic" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>

					<br>

					<div>
						<div>
							<h3>FOLLOW ME</h3>
						</div>
						<div><!--font owsome--></div>	
					</div>
					
				</div>
				
			</div>
		</div>
	</section>

	<section>
		<div class="text-center">
			<h2>GALLERY</h2>
		</div>

		<div class="text-center img-size">
			<div class="container">

				<?php 

					$img3=database("r", "SELECT id, img_name FROM data_contents WHERE page='home' and reference='gallery'");

					if(count($img3)==0) { ?>

						<div style="background-image: url('images/no_event.jpg'); height: 210px">
							<h3 class="text-center" style="padding-top:60px; color: white;">THE GALLERY IS UMPTY</h3>

							<div style="padding:20px">
								<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddModal3">ADD NEW</button>
							</div>
						</div>
				
					<?php }

					else { ?>
						<div class="row">
							<?php

							$i=0;
							while ($i<4) {

								if ($i<count($img3)) {?>
									<div class="col-md-3">
										<img <?php echo 'src="images/'.$img3[$i]["img_name"].'"';?> alt="img">
										<div>
											<form method="POST" action="">
												<input class="btn btn-danger" <?php echo 'name="gallery'.$i.'"';?> type="submit" value ="Delete">
												<input class="btn btn-primary" <?php echo 'name="gallery"';?> type="submit" value ="Update">
											</form>
										</div>
									</div>

								<?php }

								else {?>
									<div class="col-md-3">
										<div style="padding-top:80px">
											<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddModal3">ADD NEW</button>
										</div>
									</div>

									<?php break;
								}
							$i++;						
						}?>	

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

	<!-- The Modal 1 ADD-->
	<div class="modal" id="AddModal1">
		<div class="modal-dialog">
    		<div class="modal-content">
    			<!-- Modal Header -->
    			<div class="modal-header">
    				<h4 class="modal-title">ADD LATEST EVENT</h4>
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    			</div>
    			<!-- Modal body -->
    			<form method="post" action="" enctype="multipart/form-data">
    				<div class="modal-body">
    					<div>
    						<label>Event Title: </label><br>
    						<input type="text" name="Event1_title" required="required">
    					</div>
    					<div>
    						<label>Image:</label><br>
    						<input type="file" name="file1" required="required">
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
    <!-- end modal 1 -->

    <!-- The Modal 2 -->
	<div class="modal" id="AddModal2">
		<div class="modal-dialog">
    		<div class="modal-content">
    			<!-- Modal Header -->
    			<div class="modal-header">
    				<h4 class="modal-title">ADD UPCOMING EVENT</h4>
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    			</div>
    			<!-- Modal body -->
    			<form method="post" action="" enctype="multipart/form-data">
    				<div class="modal-body">
    					<div>
    						<label>Event Title: </label><br>
    						<input type="text" name="Event2_title" required="required">
    					</div>
    					<div>
    						<label>Image:</label><br>
    						<input type="file" name="file2" required="required">
    					</div>
    					<div>
    						<label>Text Brief</label><br>
    						<textarea name="textBrief" id="message" required="required" class="form-control" rows="8"></textarea>
    					</div>
      				</div>
      			<!-- Modal footer -->
	      			<div class="modal-footer">
	      				<button type="submit" class="btn btn-primary" name="add2">ADD</button>
	        			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      			</div>
	      		</form>
      		</div>
      	</div>
    </div>

    <!-- The Modal 3 -->
	<div class="modal" id="AddModal3">
		<div class="modal-dialog">
    		<div class="modal-content">
    			<!-- Modal Header -->
    			<div class="modal-header">
    				<h4 class="modal-title">ADD GALLERY</h4>
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    			</div>
    			<!-- Modal body -->
    			<form action="" method="POST" enctype="multipart/form-data">
    				<div class="modal-body">
    					<label>Image:</label><br>
    					<input type="file" name="file3">
      				</div>
      			<!-- Modal footer -->
	      			<div class="modal-footer">
	      				<button type="submit" class="btn btn-primary" name="add3">ADD</button>
	        			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      			</div>
	      		</form>
      		</div>
      	</div>
    </div>

	<?php

	//DELETE LATEST EVENTS

	if (isset($_POST['event0'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img1[0]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	if (isset($_POST['event1'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img1[1]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	if (isset($_POST['event2'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img1[2]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	if (isset($_POST['event3'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img1[3]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	//DELETE UPCOMING EVENTS

	if (isset($_POST['event10'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img2[0]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	if (isset($_POST['event11'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img2[1]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	//DELETE LATEST GALLERY

	if (isset($_POST['gallery0'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img3[0]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	if (isset($_POST['gallery1'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img3[1]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	if (isset($_POST['gallery2'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img3[2]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

	if (isset($_POST['gallery3'])) {
		database("", "DELETE FROM data_contents WHERE id=".$img3[3]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
		}

		//ADD

	if (isset($_POST['add'])) {

		$file=$_FILES['file1'];
		$img_name=$_FILES['file1']['name'];
		$img_tmp_loc=$_FILES['file1']['tmp_name'];
		$img_tilte=$_POST['Event1_title'];

		$img_ext=explode('.', $img_name);
		$ext=strtolower(end($img_ext));
		$ext_allowed=array('jpg', 'jpeg', 'png');

		if (in_array($ext, $ext_allowed)) {
			$file_name=uniqid('', true).".".$ext;
			$file_dest="images/".$file_name;
			move_uploaded_file($img_tmp_loc, $file_dest);
			database("", "INSERT INTO data_contents (page, reference, img_name, title) VALUES ('home', 'event', '".$file_name."', '".$img_tilte."')");
		}
		
		echo "<meta http-equiv='refresh' content='0'>";
	}

	if (isset($_POST['add2'])) {

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
			database("", "INSERT INTO data_contents (page, reference, img_name, title, paragraphe) VALUES ('home', 'event1', '".$file_name."', '".$img_tilte."', '".$img_brief."')");
		}		
		
		echo "<meta http-equiv='refresh' content='0'>";
	}

	if (isset($_POST['add3'])) {

		$file=$_FILES['file3'];
		$img_name=$_FILES['file3']['name'];
		$img_tmp_loc=$_FILES['file3']['tmp_name'];

		$img_ext=explode('.', $img_name);
		$ext=strtolower(end($img_ext));
		$ext_allowed=array('jpg', 'jpeg', 'png');

		if (in_array($ext, $ext_allowed)) {
			$file_name=uniqid('', true).".".$ext;
			$file_dest="images/".$file_name;
			move_uploaded_file($img_tmp_loc, $file_dest);
			database("", "INSERT INTO data_contents (page, reference, img_name) VALUES ('home', 'gallery', '".$file_name."')");
		}
		
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