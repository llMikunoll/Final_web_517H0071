<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Schedule</title>
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
	$sql = "SELECT IdSchedule, IdStaff, Weekdays FROM schedules ORDER BY IdSchedule";
	$result = $conn->query($sql);

	$IdSchedule  = array();
	$IdStaff = array();
	$Weekdays = array();
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		
		array_push($IdSchedule, $row["IdSchedule"]);
		array_push($IdStaff, $row["IdStaff"]);
		array_push($Weekdays, $row["Weekdays"]);
		}
	} 
	$length = count($IdStaff);

    $next = 1;
    
    if (isset($next)){
        $i=0;
        $NameStaff  = array();
        while($i < $length){
            $sql1 = "SELECT Name, Email FROM staff_info WHERE IdStaff = $IdStaff[$i]" ;
            $result1 = $conn->query($sql1);
            
            

            if ($result1->num_rows > 0) {
                while($row = $result1->fetch_assoc()) {
                
                    array_push($NameStaff, $row["Name"]);
                }

            }
            $i= $i + 1;
        }
    }
    
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
					<li class="current">
						<a href="schedule.php">Schedule</a>
					</li>
					<li>
						<a href="menu.php">Cart</a>
					</li>
				</ul>
			</div>
			<div id="body" style="<?php if(isset($_SESSION['Role'])){ if($_SESSION['Role']=="admin" || $_SESSION['Role']=="staff" ){echo 'display: block;'; } else{echo 'display: none;';}}else{echo 'display: none;';}?>">
				<div id="figure">
					<img src="images/headline-locations.jpg" alt="Image">
                </div>
                <div id = "schedule" >
                    <table border="1px" width = "100%" height = "300px">
                        <tr style = "background-color: #3935ff;">
                            <td>Shift | Day</td>
                            <td>Monday</td>
                            <td>Tuesday</td>
                            <td>Wednesday</td>
                            <td>Thursday</td>
                            <td>Saturday</td>
                        </tr>
                        <tr >   
                            <td style = "background-color: #3935ff;">Morning shift</td>
                            <?php $z =0; for($i=0;$i<$length;$i++){$Mshift = 0; $Mshift = $IdSchedule[$i];?>
                            
                            <?php if($Mshift == 1){?><td style = "background-color: #FDA7DF;"><?php echo $NameStaff[$i];}?></td>
                            <?php if($Mshift == 3){?><td style = "background-color: #FDA7DF;"><?php echo $NameStaff[$i];}?></td>
                            <?php if($Mshift == 5){?><td style = "background-color: #FDA7DF;"><?php echo $NameStaff[$i];}?></td>
                            <?php if($Mshift == 8){?><td style = "background-color: #FDA7DF;"><?php echo $NameStaff[$i];}?></td>
                            <?php if($Mshift == 9){?><td style = "background-color: #FDA7DF;"><?php echo $NameStaff[$i];}?></td>
                            <?php } ?>
                        </tr>
                        <tr >
                            <td style = "background-color: #3935ff;">Afternoon shift</td>
                            <?php $z =0; for($i=0;$i<$length;$i++){ $Mshift = 0;$Mshift = $IdSchedule[$i];?>
                            
                            <?php if($Mshift == 2){?><td style = "background-color: #FDA7DF;"><?php echo $NameStaff[$i];} ?></td>
                            <?php if($Mshift == 4){?><td style = "background-color: #FDA7DF;"><?php echo $NameStaff[$i];} ?></td>
                            <?php if($Mshift == 6){?><td style = "background-color: #FDA7DF;"><?php echo $NameStaff[$i];} ?></td>
                            <?php if($Mshift == 8){?><td style = "background-color: #FDA7DF;"><?php echo $NameStaff[$i];} ?></td>
                            <?php if($Mshift == 10){?><td style = "background-color: #FDA7DF;"><?php echo $NameStaff[$i];} ?></td>
                            <?php } ?>
                        </tr>
                    </table>
                </div>
			</div>
			<div id="footer">
				<?php include 'footer.php';?>
			</div>
		</div>
	</div>
</body>
</html>