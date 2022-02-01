<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="//theme.hstatic.net/1000026716/1000440777/14/styles.css?v=12358" rel="stylesheet" type="text/css" media="all">
    <link href="//theme.hstatic.net/1000026716/1000440777/14/bootstrap.css?v=12358" rel="stylesheet" type="text/css" media="all">
    <link href="//theme.hstatic.net/1000026716/1000440777/14/font-awesome.css?v=12358" rel="stylesheet" type="text/css" media="all">

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
         
    }
 ?>
	<div class="noindex">
        <div id="layout-page-register" class="container">
            <span class="header-contact header-page clearfix">
                <h1 class="title-register">Register</h1>
                
            </span>
            <div class="userbox">
                <form accept-charset="UTF-8" action="register.php" id="create_customer" method="post">
                    <input name="form_type" type="hidden" value="create_customer">
                    <input name="utf8" type="hidden" value="✓">
                    <input name="__RequestVerificationToken" type="hidden" value="CfDJ8FyFPV59mBtNhmQGz0fYZt8ufYP9iZUA8aU-nxWUC23TP5n-qPvcBo5NBlKDtbmKunyJ6TIkHseOekLcHJFqZjH_sIfvRWtNJJFoFtHRTLTvtghl0hrNobOMiFhG8YCAJzxyPoF4Q4POw5w8DHRVSjk">

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input required="" type="text" value="" name="first_name" placeholder="First Name" id="fa" class="text form-control" size="30">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input required="" type="text" value="" name="last_name" placeholder="Last Name" id="ln" class="text form-control" size="30">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input required="" type="email" value="" name="email" placeholder="Email" id="e" class="text form-control" size="30">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input required="" type="password" value="" name="password" placeholder="Password" id="p" class="text form-control" size="30">
                    </div>

                    <div class="action_bottom">
                        <input class="btn"  type="submit" value="Register">	
                    </div>
                    <div class="req_pass">
                        <a class="come-back" href="login.php">Come back</a>
                    </div>
		        </form>
	        </div>


    <?php 
        //$name = $_POST["name"] ;
        //$price = $_POST["price"];
        //$description = $_POST["description"];
        if(isset($_POST["first_name"],$_POST["last_name"],$_POST["email"],$_POST["password"])){
                
            $PFName =$_POST["first_name"];
            $PLName =$_POST["last_name"];
            $PEmail =$_POST["email"];
            $PPassword =$_POST["password"];
        }
        if(isset($PFName,$PLName,$PEmail,$PPassword)){

            $sql2 = "SELECT Email FROM users WHERE Email= '$PEmail'";
			$result2 = $conn->query($sql2);


			if ($result2->num_rows > 0) {
				while($row = $result2->fetch_assoc()) {
					
					// no need
			
				}
                echo "<br>";
                echo '<h5 style ="text-align: center; color: red; ">This e-mail is already taken</h5>';

			} 

            //$hashed_password = password_hash($PPassword, PASSWORD_DEFAULT);
            //echo $hashed_password;
            //$hashed_password = '$2y$10$bDjOsDFr3uTyU0UEzKncVu9LXwnHi2cO54fESfVd0bLh4qqiVU4fq';
            //echo $hashed_password; 
            // $_POST["password"] ---> Is The User`s Input
            // $hashed_password ---> Is The Hashed Password You Can Store In Your DataBase
            
            //if(password_verify($PPassword,$hashed_password))
            //    echo "Welcome";

            //    else
            //    echo "Wrong Password";

            // $_POST["password"] ---> Is The User`s Input
            // $hashed_password ---> Is The Hashed Password You Have Fetched From DataBase

            //$PFName =$_COOKIE["FName"];
            //$PLName =$_COOKIE['LName'];
            //$PEmail =$_COOKIE['Email'];
            //$PPassword =$_COOKIE['Password'];

        
            else {
                $sql = "INSERT INTO users (FirstName, LastName, Email, Password, Role)
                VALUES ('$PFName', '$PLName','$PEmail','$PPassword', 'customer')";
            
                if ($conn->query($sql) === TRUE) {
                        header("Location: login.php");
                        die();
                    } else {
                        echo " Register fail, please enter again!!";
                    }
            }
        }  
    ?>

</body>
</html>