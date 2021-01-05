
<?php require "database.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>ACT | EVENTS</title>

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
			<h1 class="text-center" style="padding:100px; color: white;">TOUR DATES</h1>
		</div>				
	</header>

	<section>

		<?php

		$event=database("SELECT * FROM events WHERE 1");

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
					<img <?php echo 'src="admin/images/'.$event_img.'"';?> alt="img">
				</div>
				<div class="col-md-6">
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
								</tr>
							<?php

								$i++;
							} 
						} 
						else { ?>

							<tr>
								<td>No event</td>
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



</body>
</html>