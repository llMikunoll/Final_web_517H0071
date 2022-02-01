<?php  
session_start();  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>About</title>
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
					<li>
						<a href="locations.php">Locations</a>
					</li>
					<li>
						<a href="blog.php">Blog</a>
					</li>
					<li class="current">
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
					<img src="images/headline-about.jpg" alt="Image">
				</div>
				<div>
					<a href="about.php" class="about">About</a>
					<div>
						<h3>The COFFEE Blog exists to help people find tremendous coffee and tea, both in their backyard and in their travels.</h3>
						<p style ="color : #8B4513;"> 
						<b>While there are tons of sites that offer to help find good coffee, most of these sites rely on an unpredictable “user rating” whereas others simply borrow the recommendations of others. 
                        </b>
						</p>
						<p style ="color : #8B4513;">
                        <b>
						It should also be noted that the YAY!KOFFEE Blog seeks to exalt those in the industry who are doing great things with coffee and tea, but this is not a blog that focuses on the microscopic differences. If a coffeehouse can pull quality shots of espresso and pour a toothsome cup of coffee, that’s all we are really looking for (though admittedly, some small differences cannot be overlooked). In short, the goal is to make known quality establishments and products, not to dissect minor differences. 
                        </b>
 						</p>
						<h3>How It Works </h3>
						<p style ="color : #8B4513;">
                        <b>
						Mugged: Objective reviews of coffees, teas or other related products in my home laboratory.
                        </b>
						</p>
						<p style ="color : #8B4513;">
                        <b>
						Most often, these are coffees or teas sent to me from various roasters/purveyors looking for feedback.
                        </b>
						</p>
						<h3>Other </h3>
						<p style ="color : #8B4513;">
                        <b>
						About 2% of the time, I will throw up a post on something not fitting into the top two categories. Tis rare, but every now and then something deserves a little attention.
                        </b>
						</p>
						<h3>About Conflicts of Interest </h3>
						<p style ="color : #8B4513;">
                        <b>
						From time to time, I will work as a consultant or work with a specific coffee company to boost their products. This can include sponsored content (which is ALWAYS noted within the post/social media), behind-the-scenes help or even on the street work. 
                        </b>
						</p>
						<p style ="color : #8B4513;">
                        <b>
						To keep things honest and avoid conflicts of interest, if I am engaged in any level of contracted work with a coffee or tea company, I will usually keep their products/services off the blog and social media. In the event I do put said company on the blog or social media, I will explicitly state my relationship with the respective content. 
                        </b>
						</p>
						<p style ="color : #8B4513;">
                        <b>
						Overall, thank you for reading. 
                        </b>
						</p>
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