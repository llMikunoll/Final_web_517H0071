<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Locations</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="page">
		<div>
			<div id = "login">
				<a class="htopitem" href="login.php"  style="<?php if(isset($_SESSION['FName'])){echo 'display: none;'; } else{echo 'display: block;';}?>" >
					<img class="img1" src="//theme.hstatic.net/1000026716/1000440777/14/ak3.png?v=12348">

					<div class="hrdescription">
						<div class="text">Login</div>
					</div>	
				</a>
			</div>
			<div id = "loginAccount"  style="<?php if(isset($_SESSION['FName'])){echo 'display: block;'; } else{echo 'display: none;';}?>">
				<p>Hi! <?php echo $_SESSION['FName']; ?>, you login as a <?php echo $_SESSION['Role']; ?>! <a href="logout.php">Logout here</a></p>
			</div> 
			<div id="header">
				<a href="index.php"><img src="images/logo.png" alt="Image"></a>
				<ul>
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="menu.php">Menu</a>
					</li>
					<li class="current">
						<a href="locations.php">Locations</a>
					</li>
					<li>
						<a href="blog.php">Blog</a>
					</li>
					<li>
						<a href="about.php">About Us</a>
					</li>
					<li>
						<a href="schedule.php">Schedule</a>
					</li>
					<li>
						<a href="menu.php">Cart</a>
					</li>
				</ul>
			</div>
			<div id="body">
				<div id="figure">
					<img src="images/headline-locations.jpg" alt="Image">
				</div>
				
					
			</div>
			<div id="footer">
				<?php include 'footer.php';?>
			</div>
		</div>
	</div>
</body>
</html>