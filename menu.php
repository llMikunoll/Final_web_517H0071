<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Menu</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
	$servername = "sql313.epizy.com";
	$username = "epiz_25833827";
	$password = "LRaFnOYadmTh9";
	$dbname = "epiz_25833827_final_project";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT Name, Price, Quantity, picture FROM product";
	$result = $conn->query($sql);

	$Name = array();
	$Price = array();
	$picture = array();
	$Quantity = array();


	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		
		array_push($Name, $row["Name"]);
		array_push($Price, $row["Price"]);
		array_push($picture, $row["picture"]);
		array_push($Quantity, $row["Quantity"]);

		
		}
	} 
	$length = count($Name);

	$conn->close();
?>
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
					<li class="current">
						<a href="menu.php">Menu</a>
					</li>
					<li>
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
						<a href="cart.php">Cart</a>
					</li>
				</ul>
			</div>
			<div id="body">
				<div id="figure">
					<img src="images/headline-menu.jpg" alt="Image">
				</div>
				<div>
					<a href="menu.php" class="whatshot">What&#39;s Hot</a>
					<div>
						
						<ul>
							<?php $z =0; for($i=0;$i<$length;$i++){?>
							<li>
								<a href="product-detail.php?Name=<?php echo $Name[$i]; ?>"><img src="<?php echo $picture[$i]?>" alt="Image"></a>
								<div>
									
									<a href="" style ="color : #8B4513;"><?php echo $Name[$i];?></a>
									<p style =" color: black; ">
										<?php echo $Price[$i];?> $
									</p>
									<span class="order"><a href="product-detail.php?Name=<?php echo $Name[$i]; ?>" style="border-style: solid; color : #8B4513;">Order here</a></span>

									
									
								</div>
							</li>
							<?php } ?>

						</ul>
					</div>
				</div>
			</div>
			<div id="footer">
				<?php include 'footer.php';?>
			</div>
		</div>
	</div>
</body>
</html>

