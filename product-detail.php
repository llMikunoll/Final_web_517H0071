<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Product detail</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"> 
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
	$condition = $_GET['Name'];
	

	$sql = "SELECT Name, Price, Quantity, Description, picture FROM product WHERE Name= '$condition'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		
		$Name = $row["Name"];
		$Price = $row["Price"];
		$picture = $row["picture"];
		$Quantity = $row["Quantity"];
		$Description = $row["Description"];
		
		}
	} 

	$sql2 = "SELECT IdComment, UserName, Commentcontent, Date FROM comment WHERE 	NameProduct= '$condition' ";
	$result2 = $conn->query($sql2);

	$UserName = array();
	$Commentcontent = array();
	$IdComment  = array();
	$DateC = array();

	if ($result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {

		array_push($UserName, $row["UserName"]);
		array_push($Commentcontent, $row["Commentcontent"]);
		array_push($IdComment, $row["IdComment"]);
		array_push($DateC, $row["Date"]);

		}
	}
	$length = count($IdComment);
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
                <div class="container-fliud">
                    <div class="wrapper row"> 
                        <div class="preview col-md-6"> 
                            <div class="preview-pic tab-content"> 
                                <div class="tab-pane active" id="pic-1"><img src="<?php echo $picture ; ?>" alt="">
                                </div> 
                    
                            </div> 
                    
                        </div> 
                        <div class="details col-md-6" style = "color : #8B4513;"> 
                            <h3 class="product-title"><?php echo $Name ; ?></h3> 
                            <div class="rating"> 
                                <div class="stars"> Rate:  <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> 
                                </div> <span class="review-no">number of reviews: <?php echo $length; ?></span> 
                            </div> 
							<p class="product-description"><b>Description: </b> <?php echo $Description ; ?></p> 
							<h4 class="price">Quantity: <?php echo $Quantity ; ?></h4>
                            <h4 class="price">Price: <?php echo $Price ; ?> $</h4> 
                            
                            </p> 
                            <div class="action"> 
                                <a href="cart.php?Name=<?php echo $Name ; ?>" target="_blank">            
                                    <button class="add-to-cart btn btn-default" type="button">Buy Now</button>            
                                </a> 
                            
                            </div> 
                        </div> 
					</div>
					 
				</div>
				<div id ="comment"><p>Comment about this product!</p></div>
				<div id= "Lcomment" style="<?php if(isset($_SESSION['FName'])){echo 'display: none;'; } else{echo 'display: block;';}?>"><p style = "font-size :25px; color: gray; margin-top=50px">You must login to comment for this product!!</p></div>
				<div id= "Scomment" style="<?php if(isset($_SESSION['FName'])){echo 'display: block;'; } else{echo 'display: none;';}?>">
					<form action="product-detail.php?Name=<?php echo $Name; ?>" accept-charset="UTF-8" method="post">
						<div class="field">
                            <div class="input-wrapper">
                                <img  border= "1px solid;" width="40px" height="40px" src="images/logo.png" alt="">
								<input  placeholder="Type your words" autocapitalize="off" spellcheck="false" class="field-input"  type="text"  name="comment" value="">
								<button type= "submit">send</button>
								<p style="margin-left:45px;color:#cd6133;"><?php $t=time();echo(date("Y-m-d",$t));?></p>
                            </div>
                                                            
						</div>
					</form>
					
				</div>
				<div id ="Acomment">
					<?php $z =0; for($i=0;$i<$length;$i++){?>
					<img style ="float: left" border= "1px solid;" width="40px" height="40px" src="images/logo.png" alt="">
					<p style="color:#cd6133;padding-left:50px"><?php echo $UserName[$i]; ?>: <?php echo $Commentcontent[$i];?></p>
					<p style="font-size: 12px;margin-left:50px;color:#cd6133;padding-bottom: 30px;"><?php echo $DateC[$i]?></p>
					<?php }?>
				</div>
            </div>
			<div id="footer">
				<?php include 'footer.php';?>
			</div>
		</div>
	</div>
	<?php
		if(isset($_POST["comment"])){
                
            $Comment =$_POST["comment"];
            
        }
		if(isset($Comment)){

			$UserName = $_SESSION['FName'];
			$t=time();
			$date = date("Y-m-d",$t);
			$ProductName = $_GET['Name'];

			$sql = "INSERT INTO comment (NameProduct, UserName, Commentcontent, Date)
            VALUES ('$ProductName', '$UserName','$Comment','$date')";
            
            if ($conn->query($sql) === TRUE) {
                
                } else {
                    
                }

		}
	?>
</body>
</html>