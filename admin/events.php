
<?php require "database.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ACT | EVENTS</title>

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
			<h1 class="text-center" style="padding:100px; color: white;">TOUR DATES</h1>
		</div>				
	</header>

	<section>

		<?php

		$event=database("r", "SELECT * FROM events WHERE 1");

		if(count($event)==0) {

			$event_img="no_event.jpg";
		}

		else {

			$event_img=$event[0]['img_name'];

		} ?>

		<div class="text-center">
			<h3>FUTURE CONCERTS AND EVENTS</h3>			
		</div><br>
		<div class="container">
			<div class="row">
				<div class="col-md-5 img1-size">
					<img <?php echo 'src="images/'.$event_img.'"';?> alt="img">
				</div>
				<div class="col-md-6">
					<?php if (count($event)<11) { ?>
						<div class="text-center">
							<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddModal">ADD NEW TOUR</button>
						</div>
					<?php } ?>

					<div class="text-center"><br>
						<table class="table">
							<tr>
								<th>EVENT</th>
								<th>PLACE</th>
								<th>DATE</th>
							</tr>

							<?php 

							if (count($event)==0) { ?>

								<tr>
									<td>No event</td>
									<td></td>
									<td></td>
								</tr>

							<?php }

							else { ?>

								<tr>
									<td><?php echo ($event[0]['title']);?></td>
									<td><?php echo ($event[0]['place']);?></td>
									<td><?php echo ($event[0]['date_ev']);?></td>
									<td>
										<form style="float: right;" method="POST" action="">
											<input name="del0" type="submit" value ="Delete">
											<input name="event" type="submit" value ="Update">
										</form>
									</td>
								</tr>

							<?php } ?>
						</table>
					</div>

					<div class="text-justify">
						<p><td><?php if (count($event)!=0){ echo ($event[0]['paragraphe']);}?></td></p>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="text-center">
				<br>
				<h3>OTHERS UPCOMING EVENTS</h3>			
				<br>
				<div>
					<table class="table">
						<tr>
							<th>EVENT</th>
							<th>PLACE</th>
							<th>DATE</th>
							<th>DETAILS</th>
						</tr>

					<?php
						if (count($event)>1) {
							$i=1;
							while ($i<count($event) and $i<15) { ?>

								<tr>
									<td><?php echo ($event[$i]["title"]);?></td>
									<td><?php echo ($event[$i]["place"]);?></td>
									<td><?php echo ($event[$i]["date_ev"]);?></td>
									<td><?php echo ($event[$i]["paragraphe"]);?></td>
									<td>
										<form style="float: right;" method="POST" action="">
											<input <?php echo 'name="del'.$i.'"';?> type="submit" value ="Delete">
											<input name="event" type="submit" value ="Update">
										</form>
									</td>
								</tr>
							<?php

								$i++;
							} 
						} 
						else { ?>

							<tr>
								<td>No Event</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
							</tr>

						<?php } ?>

					</table>
				</div>	
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
    				<h4 class="modal-title">ADD TOUR</h4>
    				<button type="button" class="close" data-dismiss="modal">&times;</button>
    			</div>
    			<!-- Modal body -->
    			<form method="post" action="" enctype="multipart/form-data">
    				<div class="modal-body">
    					<div>
    						<label>Tour Title: </label><br>
    						<input type="text" name="Event2_title">
    					</div><br>
    					<div>
    						<label>Place: </label><br>
    						<input type="text" name="place">
    					</div><br>
    					<div>
    						<label>Tour Image:</label><br>
    						<input type="file" name="file2">
    					</div><br>
    					<div>
    						<label>Tour Date:</label><br>
    						<input type="date" name="date">
    					</div><br>
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
		$place=$_POST['place'];
		$date=$_POST['date'];

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
			database("", "INSERT INTO events (place, date_ev, img_name, title, paragraphe) VALUES ('".$place."', '".$date."', '".$file_name."', '".$img_tilte."', '".$img_brief."')");
		}		
		
		echo "<meta http-equiv='refresh' content='0'>";
	}

	//DEL

	if (isset($_POST['del0'])) {
		database("", "DELETE FROM events WHERE id=".$event[0]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['del1'])) {
		database("", "DELETE FROM events WHERE id=".$event[1]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['del2'])) {
		database("", "DELETE FROM events WHERE id=".$event[2]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['del3'])) {
		database("", "DELETE FROM events WHERE id=".$event[3]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['del4'])) {
		database("", "DELETE FROM events WHERE id=".$event[4]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['del5'])) {
		database("", "DELETE FROM events WHERE id=".$event[5]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['del5'])) {
		database("", "DELETE FROM events WHERE id=".$event[6]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['del5'])) {
		database("", "DELETE FROM events WHERE id=".$event[7]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['del5'])) {
		database("", "DELETE FROM events WHERE id=".$event[8]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}

	if (isset($_POST['del5'])) {
		database("", "DELETE FROM events WHERE id=".$event[9]["id"]);
		echo "<meta http-equiv='refresh' content='0'>";		
	}


    ?>



</body>
</html>