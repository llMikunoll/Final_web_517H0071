<?php  
session_start();  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Coffee shop</title>
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
					<li class="current">
						<a href="index.php">Home</a>
					</li>
					<li>
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
					<img src="images/headline-home.jpg" alt="Image">
				</div>
				<div id="featured">
					<span class="whatshot"><a href="menu.php">Find out more</a></span>
					<div>
						<a href="menu.php"><img src="images/coffee1.jpg" alt="Image"></a>
						<a href="menu.php"><img src="images/coffee2.jpg" alt="Image"></a>
						<a href="menu.php"><img src="images/coffee3.jpg" alt="Image"></a>
					</div>
				</div>
				<div class="section">
					<ul>
						<li>
							<a href="blog.php"><img src="images/coffee-ingredients.jpg" alt="Image"></a>
							
							<a href="blog.php" class="readmore">Read More</a>
						</li>
						<li>
							<a href="blog.php"><img src="images/black-coffee.jpg" alt="Image"></a>
							
							<a href="blog.php" class="readmore">Read More</a>
						</li>
						<li>
							<a href="blog.php"><img src="images/chocolate.jpg" alt="Image"></a>
							
							<a href="blog.php" class="readmore">Read More</a>
						</li>
					</ul>
					<div>
						<ul>
							<li>
								<h3><a href="blog.php">The Art Of Pairing Chocolate And Coffee</a></h3>
								<span>22 June 2020</span>
								<p>
								Look in any bookstore and you will discover dozens of books to teach you the best way to pair wine and food...
								</p>
								<a href="blog.php" class="readmore">Read more</a>
							</li>
							<li>
								<h3><a href="blog.php">The Difference Between Light & Dark Roast Coffees </a></h3>
								<span>21 June 2020</span>
								<p>
								Everyone has a preference for dark versus light roast coffee...
								</p>
								<a href="blog.php" class="readmore">Read more</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div id="footer">
				<?php include 'footer.php';?>
			</div>
		</div>
	</div>
	<script>
	function LoginSuccess() {
        document.getElementById('login').style.display = 'none';
        document.getElementById('loginAccount').style.display='block';

    }

    function LogoutOrNotLogin() {
        document.getElementById('login-password').style.display = 'block';
        document.getElementById('loginAccount').style.display = 'none';
    }
	</script>
</body>
</html>