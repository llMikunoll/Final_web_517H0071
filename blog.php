<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
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
					<li class="current">
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
					<img src="images/headline-blog.jpg" alt="Image">
				</div>
				<div>
					<a href="blog.php" class="blog">Blog</a>
					<div id="blog">
						<ul>
							<li>
								<div>
									<div>
										<span class="month">June 2011</span><span class="date">21</span>
									</div>
									<h1><a href="blog.php">The Art Of Pairing Chocolate And Coffee </a></h1>
								</div>
								<p  style = "font-size: 16px; color : #8B4513;">
                                <b>
								Look in any bookstore and you will discover dozens of books to teach you the best way to pair wine and food. Ask the bartender at your local pub for the perfect beer to match your meal and you are sure to find a new favorite. But what if your favorite drink is coffee? Is the perfect culinary pairing for coffee a donut, bagel or bran muffin? No. It is chocolate. 
                                </b>
								</p>
								<p  style = "font-size: 16px; color : #8B4513;">
                                <b>
								Chocolate and coffee are not strangers. Besides both being a fermented fruit, café mochas and chocolate-filled pastries are popular menu items in many cafes. But, few people realize the full possibility for enjoyment which exists when combining the products that contain the finest cocoa and fresh coffee beans. Learn how to take your love of coffee and chocolate to the next level by following these suggestions. 
                                </b>
								</p>
								<a href="blog.php" class="readmore" style ="font-size: 12px"><b>Read More</b></a>
							</li>
							<li>
								<div>
									<div>
										<span class="month">June 2011</span><span class="date">22</span>
									</div>
									<h1><a href="blog.php">The Difference Between Light & Dark Roast Coffees</a></h1>
								</div>
								<p  style = "font-size: 16px; color : #8B4513;">
                                <b>
								Everyone has a preference for dark versus light roast coffee. How to know the difference, and the impact they have on the taste of your coffee. 
                                </b>
								</p>
								<p  style = "font-size: 16px; color : #8B4513;">
                                <b>
								Are you one of these people who avoid dark roasts like the plague? “No, I will not be having any of that black death in my morning cup. I like my coffee light and sweet.” 
								Or are you the opposite and prefer a brew that's super dark and will make your spoon stand on end in the morning?
                                </b>
								</p>
								<a href="blog.php" class="readmore" style ="font-size: 12px"><b>Read More</b></a>
							</li>
						
						</ul>
						<!--<ul>
							<li>
								<h2><a href="blog.php">Decription about this</a></h2>
								<span class="date">test</span>
								<p>
								Decription about this
								</p>
								<a href="blog.php" class="readmore">Read More</a>
							</li>
							<li>
								<h2><a href="blog.php">Decription about this</a></h2>
								<span class="date">test</span>
								<p>
								Decription about this
								</p>
								<a href="blog.php" class="readmore">Read More</a>
							</li>
							<li>
								<h2><a href="blog.php">Decription about this</a></h2>
								<span class="date">test</span>
								<p>
								Decription about this
								</p>
								<a href="blog.php" class="readmore">Read More</a>
							</li>
						</ul>-->
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