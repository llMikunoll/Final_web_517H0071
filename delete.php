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
    
    if (isset($_GET['Name'])){
        $st = $_GET['Name'];
        $sql = "DELETE FROM cart WHERE Name='$st'";
        $conn->query($sql);
        $conn->close();

        header("refresh:1; url = cart.php");
 
    }
?>