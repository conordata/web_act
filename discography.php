
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
			<h1 class="text-center" style="padding:100px; color: white;">DISCOGRAPHY</h1>
		</div>	
	</header>

	<section>
		<div class="text-center">
			<h3>RECORDS CATALOGUE</h3><br>
		</div>

		<div class="container">
			<table class="table">
				<tr>
					<th>TITLE</th>
					<th>RELEASE DATE</th>
					<th>ALBUM</th>
				</tr>

				<?php 

				$rec=database("SELECT * FROM records WHERE 1");

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



</body>
</html>