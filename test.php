<?php 
if(isset($FullName,$Email,$PhoneNumber,$Address)){

$sql = "INSERT INTO customer_info (Name, Email, Phone_number, Address)
VALUES ('$FullName', '$Email','$PhoneNumber','$Address')";

if ($conn->query($sql) === TRUE) {
} else {
		
}
	$sql2 = "SELECT Id_customer  FROM customer_info WHERE Email= '$Email'";
	$result2 = $conn->query($sql2);


	if ($result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {
			
			$Id_customer = $row["Id_customer"];
	
		}
		
			
		

	}    
	
	$sql = "INSERT INTO order (Id_customer, Price, Note)
	VALUES ($Id_customer, '$totalprice','')";

	if ($conn->query($sql) === TRUE) {
	} else {
			
	}
	$sql = "SELECT Id_order FROM order WHERE Id_customer= $Id_customer";
			$result = $conn->query($sql);
		   
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
			
				$Id_order = $row["Id_order"];
				}
				

			} 
	
	for($i=0;$i<$length;$i++){

		$sql = "INSERT INTO order_detail (Id_order, name_product, Quantity, Price)
		VALUES ('$Id_order', '$P_Name[$i]',$P_Amount[$i],'$PPassword', 'customer')";
	
		if ($conn->query($sql) === TRUE) {
				
		} else {
				
		}
	}


}
?>