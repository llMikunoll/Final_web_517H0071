<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <div class="container" id="layout-page-login">
        <div id="customer-login">
            <span class="header-contact header-page clearfix">
                <h1 id="title-login" style="display: block;">Login</h1>
            </span>
            <div id="login" class="userbox" style="display: block;">
                <div class="accounttype">
                    <h2 class="title"></h2>
                </div>
                <form accept-charset="UTF-8" action="login.php" id="customer_login" method="post">
                    <input name="form_type" type="hidden" value="customer_login">
                    <input name="utf8" type="hidden" value="✓">

                    

                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input required="" type="email" value="" name="email" id="email" placeholder="Email" class="text form-control" aria-describedby="basic-addon1">
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input required="" type="password" value="" name="password" id="password" placeholder="Password" class="text form-control" size="16">
                    </div>
                    

                    <div class="action_bottom">
                        <input class="btn btn-signin" type="submit" value="Login">
                    </div>
                    <div class="req_pass">
                        <a href="#" onclick="showRecoverPasswordForm();return false;" >Forgot your password?</a>

                        or <a href="register.php" title="Register">Register</a>
                    </div>

                </form>
            </div>

            <div id="recover-password" style="display: none;" class="userbox">
                <div class="accounttype">
                    <h2>Password assistance</h2>
                </div>		

                <form accept-charset="UTF-8" action="/account/recover" method="post">
                    <input name="form_type" type="hidden" value="recover_customer_password">
                    <input name="utf8" type="hidden" value="✓">

                    
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input required="" type="email" value="" name="email" id="recover-email" placeholder="Email" class="text form-control" aria-describedby="basic-addon1">
                    </div>

                    <div class="action_bottom">
                        <input class="btn" type="submit" value="Send">
                    </div>
                    <div class="req_pass">
                        <a href="#" onclick="hideRecoverPasswordForm();return false;">Cancel</a>
                    </div>
                </form>
		    </div>
	    </div>
    </div>
    <script>
    function showRecoverPasswordForm() {
        document.getElementById('recover-password').style.display = 'block';
        document.getElementById('login').style.display='none';
        document.getElementById('title-login').style.display='none';

    
    }

    function hideRecoverPasswordForm() {
        document.getElementById('recover-password').style.display = 'none';
        document.getElementById('login').style.display = 'block';
        document.getElementById('title-login').style.display='block';
    }
    </script>

    <?php 
        if(isset($_POST["email"],$_POST["password"])){
            $Email = $_POST["email"];
            $Password = $_POST["password"];

            $sql = "SELECT FirstName, LastName, Email, Password, Role FROM users WHERE ( Email = '$Email') AND ( Password = '$Password') ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            
                    
                    $FName = $row["FirstName"];
                    $Role = $row["Role"];    

            
                }
                $_SESSION['FName']=$FName;
                $_SESSION['Role']=$Role;
                header("Location:index.php");
                
            }
            else  
            {  
            echo "<script>alert('Email or password is incorrect!')</script>";  
            } 
            
            $conn->close();
        }
    ?>
		
</body>
</html>