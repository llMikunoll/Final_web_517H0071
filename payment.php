<?php 
    @ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//hstatic.net/0/0/global/checkouts.css?v=1.1" rel="stylesheet" type="text/css" media="all">
    <title>Payment</title>
</head>
<body style="">
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

    $sql3 = "SELECT Name, Price, picture, Amount FROM cart";
	$result3 = $conn->query($sql3);

	$P_Name = array();
	$P_Price = array();
	$P_picture = array();
	$P_Amount = array();

   
	if ($result3->num_rows > 0) {
		// output data of each row
		while($row = $result3->fetch_assoc()) {

		array_push($P_Name, $row["Name"]);
		array_push($P_Price, $row["Price"]);
		array_push($P_picture, $row["picture"]);
		array_push($P_Amount, $row["Amount"]);
		}
	} 
    $length = count($P_Name);
    

	$totalprice = 0;
	for($y=0;$y<$length;$y++){
		$totalprice = $totalprice + $P_Price[$y];
	}

    
?>
    <div class="content">
        <div class="wrap">
            <div class="sidebar">
                <div class="sidebar-content">
                    <div class="order-summary order-summary-is-collapsed">
                        <h2 class="visually-hidden">Thông tin đơn hàng</h2>
                        <div class="order-summary-sections">
                            <div class="order-summary-section order-summary-section-product-list" data-order-summary-section="line-items">
                                <table class="product-table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                            <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                            <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                            <th scope="col"><span class="visually-hidden">Giá</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $z =0; for($i=0;$i<$length;$i++){?>
                                            <tr class="product" data-product-id="1026083001" data-variant-id="1057386769">
                                                <td class="product-image">
                                                    <div class="product-thumbnail">
                                                        <div class="product-thumbnail-wrapper">
                                                            <img class="product-thumbnail-image"  src="<?php echo $P_picture[$i] ; ?>">
                                                        </div>
                                                        <span class="product-thumbnail-quantity" aria-hidden="true"><?php echo $P_Amount[$i] ; ?></span>
                                                    </div>
                                                </td>
                                                <td class="product-description">
                                                    <span class="product-description-name order-summary-emphasis"><?php echo $P_Name[$i] ; ?></span>
                                                    
                                                </td>
                                                <td class="product-quantity visually-hidden"><?php echo $P_Amount[$i] ; ?></td>
                                                <td class="product-price">
                                                    <span class="order-summary-emphasis"><?php echo $P_Price[$i] ; ?> $</span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
    
                            <div class="order-summary-section order-summary-section-total-lines payment-lines" data-order-summary-section="payment-lines">
                                <table class="total-line-table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                            <th scope="col"><span class="visually-hidden">Giá</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="total-line total-line-subtotal">
                                            <td class="total-line-name">Provisional Sums</td>
                                            <td class="total-line-price">
                                                <span class="order-summary-emphasis">
                                                    <?php echo $totalprice ; ?> $
                                                </span>
                                            </td>
                                        </tr>
                                        
                                        <tr class="total-line total-line-shipping">
                                            <td class="total-line-name">Transport fee</td>
                                            <td class="total-line-price">
                                                <span class="order-summary-emphasis" data-checkout-total-shipping-target="0">
                                                    
                                                        —
                                                    
                                                </span>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                    <tfoot class="total-line-table-footer">
                                        <tr class="total-line">
                                            <td class="total-line-name payment-due-label">
                                                <span class="payment-due-label-total">Total</span>
                                            </td>
                                            <td class="total-line-name payment-due">
                                                <span class="payment-due-currency">Dollar</span>
                                                <span class="payment-due-price" data-checkout-payment-due-target="1377000000">
                                                    <?php echo $totalprice ; ?> $
                                                </span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="main-header">
                    <a href="/" class="logo">
                        <h1 class="logo-text">Coffee Shop</h1>
                    </a> 
                </div>
                <div class="main-content">
                        <div class="step">
                            <div class="step-sections " step="1">
                                    <div class="section">
                                        <div class="section-header">
                                            <h2 class="section-title">Shipment Details</h2>
                                        </div>
                                        <form action="payment.php" accept-charset="UTF-8" method="post">            
                                            <div class="section-content section-customer-information no-mb">
                                                
                                                    <input name="utf8" type="hidden" value="✓">
                                                    <div class="inventory_location_data">
                                                        <input name="customer_shipping_district" type="hidden" value="">
                                                        <input name="customer_shipping_ward" type="hidden" value="">
                                                    </div>
                                                
                                                <div class="fieldset">
                                                        <div class="field field-required  ">
                                                            <div class="field-input-wrapper">
                                                                <label class="field-label" for="billing_address_full_name">Full name</label>
                                                                <input placeholder="Full name" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="text" id="billing_address_full_name" name="full_name" value="">
                                                            </div>
                                                            
                                                        </div> 
                                                            <div class="field  field-two-thirds  ">
                                                                <div class="field-input-wrapper">
                                                                    <label class="field-label" for="checkout_user_email">Email</label>
                                                                    <input placeholder="Email" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="email" id="checkout_user_email" name="email" value="">
                                                                </div>
                                                                
                                                            </div> 
                                                        <div class="field field-required field-third  ">
                                                            <div class="field-input-wrapper">
                                                                <label class="field-label" for="billing_address_phone">Phone number</label>
                                                                <input placeholder="Phone number" autocapitalize="off" spellcheck="false" class="field-input" size="30" maxlength="11" type="tel" id="billing_address_phone" name="phone_number" value="">
                                                            </div>
                                                            
                                                        </div>     
                                                        <div class="field   ">
                                                            <div class="field-input-wrapper">
                                                                <label class="field-label" for="billing_address_address1">Address</label>
                                                                <input placeholder="Address" autocapitalize="off" spellcheck="false" class="field-input" size="30" type="text" id="billing_address_address1" name="address" value="">
                                                            </div>
                                                            
                                                        </div>
                                                        <input name="utf8" type="hidden" value="✓">
                                                        <button type="submit" class="step-footer-continue-btn btn">
                                                            <span class="btn-content">Confirm Payment</span>
                                                            <i class="btn-spinner icon icon-button-spinner"></i>
                                                        </button>
                                                        

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                            </div>
                            <div class="step-footer">
                                
                                    
                                        
                                        <a class="step-footer-previous-link" href="cart.php">
                                            <svg class="previous-link-icon icon-chevron icon" width="6.7" height="11.3" viewBox="0 0 6.7 11.3"><path d="M6.7 1.1l-1-1.1-4.6 4.6-1.1 1.1 1.1 1 4.6 4.6 1-1-4.6-4.6z"></path></svg>
                                            Back to cart
                                        </a>
                            </div>
                        </div>
                    
                </div>
                <div class="main-footer">
                </div>
            </div>
        </div>
    </div>
    <?php 
        
        if(isset($_POST["full_name"],$_POST["email"],$_POST["phone_number"],$_POST["address"])){
                
            $FullName =$_POST["full_name"];
            $Email =$_POST["email"];
            $PhoneNumber =$_POST["phone_number"];
            $Address =$_POST["address"];
        }
        if(isset($FullName,$Email,$PhoneNumber,$Address)){

            $sql = "INSERT INTO customer_info (Name, Email, Phone_number, Address)
            VALUES ('$FullName', '$Email','$PhoneNumber','$Address')";
            if ($conn->query($sql) === TRUE) {
            } else {

            }
            $next = 1;
        }
        if(isset($next)){
            $sql2 = "SELECT Idcustomer  FROM customer_info WHERE Email= '$Email'";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
                while($row = $result2->fetch_assoc()) {                        
                    $Id_customer = $row["Idcustomer"];                
                }            
            }
            $next2 = 1;
        } 
        if(isset($next2)){
            $sql3 = "INSERT INTO orders (Idcustomer, Price, Note)
            VALUES ($Id_customer, $totalprice,'')";        
            if ($conn->query($sql3) === TRUE) {                    
                } else {                   
            }
            $next3 = 1;
        }
        if(isset($next3)){
            $sql4 = "SELECT Idorder FROM orders WHERE Idcustomer= $Id_customer";
			$result4 = $conn->query($sql4);
		   
			if ($result4->num_rows > 0) {
				while($row = $result4->fetch_assoc()) {
			
				$Id_order = $row["Idorder"];
				}
            } 
            $next4 = 1;
        }
        if(isset($next4)){
            for($i=0;$i<$length;$i++){
                $sql5 = "INSERT INTO order_detail (Idorder, NameProduct, Quantity, Price)
                VALUES ('$Id_order', '$P_Name[$i]',$P_Amount[$i],$P_Price[$i])";        
                if ($conn->query($sql5) === TRUE) {                     
                } else {                    
                }
            }
            $next5 = 1;

        }
        if(isset($next5)){
            // sql to delete a record
            $sql6 = "DELETE FROM cart";

            if ($conn->query($sql6) === TRUE) {
                header("Location: index.php");
                die();
            } else {
             
            }

            

        }

        
        
        

        /*
        if ($conn->query($sql) === TRUE) {
                
                $sql2 = "SELECT Id_customer  FROM customer_info WHERE Email= '$Email'";
                $result2 = $conn->query($sql2);
    
    
                if ($result2->num_rows > 0) {
                    while($row = $result2->fetch_assoc()) {
                        
                        $Id_customer = $row["Id_customer"];
                
                    }
                    $sql = "INSERT INTO order (Id_customer, Price, Note)
                    VALUES ($Id_customer, '$totalprice','')";
                
                    if ($conn->query($sql) === TRUE) {
                        $sql = "SELECT Id_order FROM order WHERE Id_customer= $Id_customer";
                        $result = $conn->query($sql);
                       
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                        
                            $Id_order = $row["Id_order"];
                            }
                            

                        } 
                    } else {
                            
                    }
        
                }    

            } else {
                    
            }
        */

    ?>
    

</body>
</html>