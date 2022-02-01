<?php  
session_start();  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Cart</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="//theme.hstatic.net/1000026716/1000440777/14/font-awesome.css?v=12219" rel="stylesheet" type="text/css" media="all">
</head>
<body>

<?php
	$Amount = 1;
	$servername = "sql313.epizy.com";
	$username = "epiz_25833827";
	$password = "LRaFnOYadmTh9";
	$dbname = "epiz_25833827_final_project";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		
	}
	if (isset($_GET['Name'])){
		$condition = $_GET['Name'];
		$sql1 = "SELECT Name, Price, Quantity, Description, picture FROM product WHERE Name= '$condition'";
		$result1 = $conn->query($sql1);


		if ($result1->num_rows > 0) {
			while($row = $result1->fetch_assoc()) {

				$Name = $row["Name"];
				$Price = $row["Price"];
				$picture = $row["picture"];
				$Quantity = $row["Quantity"];
	
			}
		} 
	}

	if(isset($picture, $Name, $Price))
	{
		
			$sql2 = "SELECT Amount FROM cart WHERE Name= '$Name'";
			$result2 = $conn->query($sql2);


			if ($result2->num_rows > 0) {
				while($row = $result2->fetch_assoc()) {
					
					$C_AMount = $row["Amount"];
			
				}
				$D_AMount = $C_AMount + 1;
				$C_Price = $Price * $D_AMount;

				$sql4 = "UPDATE cart SET Amount= $D_AMount , Price= $C_Price  WHERE Name='$Name'";

				if ($conn->query($sql4) === TRUE) {
				
				} else {
				
				}

			} 
		
			else {
				$sql = "INSERT INTO cart (picture, Name, Amount, Price)
				VALUES ('$picture', '$Name',$Amount,$Price)";
			
				if ($conn->query($sql) === TRUE) {
					
					} else {
					
					}
			}
	}

	$sql3 = "SELECT Name, Price, picture, Amount FROM cart";
	$result3 = $conn->query($sql3);

	$S_Name = array();
	$S_Price = array();
	$S_picture = array();
	$S_Amount = array();
	$del = array();
 	$upd = array();
   
	if ($result3->num_rows > 0) {
		// output data of each row
		while($row = $result3->fetch_assoc()) {

		array_push($S_Name, $row["Name"]);
		array_push($S_Price, $row["Price"]);
		array_push($S_picture, $row["picture"]);
		array_push($S_Amount, $row["Amount"]);
		array_push($del,"<a onClick=\"javascript: return confirm('Please confirm deletion');\" href = ' delete.php?Name=". $row['Name']."'class='cart'><i class='fa fa-trash'></i></a>");
 		//array_push($upd,'<a href = " update.php?id='. $row["id"].'">Update</a>');
		//<a href="" class="cart"><i class="fa fa-trash"></i></a>
		}
	} 
	$length = count($S_Name);


	

 	$conn->close();
	$totalprice = 0;
	for($y=0;$y<$length;$y++){
		$totalprice = $totalprice + $S_Price[$y];
	}
?>
<script>
    $(document).ready(function () {


        $(".delete").click(function () {

            $('#myModal').modal({
                backdrop: 'static',
                keyboard: false
            });

        });


    });
</script>

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
					<li>
						<a href="about.php">About Us</a>
					</li>
					<li>
						<a href="schedule.php">Schedule</a>
					</li>
					<li class="current">
						<a href="cart.php">Cart</a>
					</li>
				</ul>
			</div>
			<div id="body">
				<div id="figure">
					<img src="images/headline-cart.jpg" alt="Image">
                </div>
                <form action="payment.php" method="post" id="cartformpage">
					<table width="100%">
						<thead>
							<tr style="color : #8B4513;">
								<th class="image">Product</th>
								<th class="item">Product Name</th>
								<th class="qty">Amount</th>
								<th class="price">Price</th>
								<th class="remove">Delete</th>
							</tr>
						</thead>
						<tbody class= "table-row-2">
							<?php $z =0; for($i=0;$i<$length;$i++){?>								
							<tr>
								<td class="image">
									<div class="product_image">										
										<img src="<?php echo $S_picture[$i] ; ?>">											
									</div>
								</td>
								<td class="item">
									<p style="color : #8B4513;"><?php echo $S_Name[$i] ; ?></p>
								</td>
								<td class="qty">
									<input type="number" size="4" name="updates" min="1" id="updates_1057386769" value="<?php echo $S_Amount[$i] ; ?>" onfocus="this.select();" class="tc item-quantity">
								</td>
								<td class="price" style="color : #8B4513;"><?php echo $S_Price[$i]; ?> $</td>
								<td class="remove">
									<?php echo $del[$i];?>
								</td>
							</tr>	
							<?php } ?>	
							<tr class="summary">
								<td colspan="4" style="font-weight: bold; font-size: 20px; padding-left: 100px; color : #8B4513;">Total: </td>
								
								<td class="price">
									<span class="total" >
										<strong><?php echo $totalprice;?> $</strong>
									</span>
								</td>								
							</tr>	
										
							
							

						</tbody>
                    </table>
					<div class="cart-button">
						<div class="buttons">
							<button onclick="window.location.href='payment.php'">Pay</button>
							
						</div>
					</div>
				</form>         
			</div>
			<div id="footer">
				<?php include 'footer.php';?>
			</div>
		</div>
	</div>
</body>
</html>