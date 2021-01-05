
<?php require "database.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ACT | HOME</title>

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
		<div>
			<?php 

			$img=database("SELECT img_name FROM data_contents WHERE page='home' and reference='head'");?>
			<img style='width: 100%; height: 700px;' <?php echo "src='admin/images/0.jpg'";?> alt='img'>
			
		</div>	
	</header>

	<section>

		<div class="text-center">
			<h1>HOME PAGE</h1>
			<p>FIND HERE OUR LATEST NEWS</p>
		</div>

		<div class="text-center img-size">
			<div class="container">
				
				<?php

					$img=database("SELECT img_name, title FROM data_contents WHERE page='home' and reference='event'");

					if(count($img)==0) { ?>

						<div style="background-image: url('admin/images/no_event.jpg'); height: 210px;">
							<h3 class="text-center" style="padding:100px; color: white;">No recent events</h3>
						</div>
				
				<?php }

					else { ?>
						<div class="row">

						<?php

							$i=0;
							while (($i<count($img)) and ($i<4)) { ?>

								<div class="col-md-3">
									<img <?php echo 'src="admin/images/'.$img[$i]["img_name"].'"';?> alt="img">
									<div>
										<p><?php echo (strtoupper($img[$i]["title"]));?></p>
									</div>
								</div>

							<?php 
								
								$i++;
							} ?>
						</div>

				<?php } ?>

			</div>
			
			<?php
				if (count($img)>3) { ?>

					<div class="text-center">
						<a href="#" class="btn btn-primary text-center" role="button">SEE MORE</a>
					</div>

			<?php } ?>
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

						$img=database("SELECT img_name, title, paragraphe FROM data_contents WHERE page='home' and reference='event1'");

						if(count($img)==0) { ?>

							<div style="background-image: url('admin/images/no_event.jpg'); height: 360px">
								<h3 class="text-center" style="padding-top:150px; color: white;">No upcoming events</h3>
							</div>
					
					<?php }

						else {
							$i=0;
							while (($i<count($img)) and ($i<3)) { ?>

								<div>
									<img <?php echo 'src="admin/images/'.$img[$i]["img_name"].'"';?> alt="img">
									<div>
										<a href=""><h3><?php echo (strtoupper($img[$i]["title"]));?></h3></a>
										<p><?php echo ($img[$i]["paragraphe"]);?></p>
									</div>
								</div>
								
							<?php
								$i++;
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
							<iframe width="300" height="240" src="https://www.youtube.com/embed/pMfFQgVybic" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>

					<div class="div-right">
						<div class="text-center">
							<br>
							<h3>LATEST RECORDS</h3>

							<?php

								$rec=database("SELECT title FROM records");

								if (count($rec)==0) {
									echo "Not Records found";
								}

								else {
									$i=0; ?>

									<ol class="text-left">
										<?php
											while (($i<count($rec)) and ($i<10)) { ?>

												<li><a href=""><?php echo ($rec[$i]["title"]);?></a></li>

										<?php $i++; } ?>
	
									</ol>

							<?php } ?>

						</div>
					</div>

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

					$img=database("SELECT img_name FROM data_contents WHERE page='home' and reference='gallery'");

					if(count($img)==0) { ?>

						<div style="background-image: url('admin/images/no_event.jpg'); height: 210px;">
							<h3 class="text-center" style="padding:100px; color: white;">The gallery is empty</h3>
						</div>
				
				<?php }

					else { ?>
						<div class="row">

							<?php
								$i=0;
								while (($i<count($img)) and ($i<4)) { ?>

									<div class="col-md-3">
										<img <?php echo 'src="admin/images/'.$img[$i]["img_name"].'"';?> alt="img">
									</div>
							
							<?php $i++; } ?>

						</div>

					<?php } ?>
			</div>
			
			<?php
				if (count($img)>3) { ?>
	
					<div class="text-center">
						<a href="#" class="btn btn-primary text-center" role="button">SEE MORE</a>
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



</body>
</html>