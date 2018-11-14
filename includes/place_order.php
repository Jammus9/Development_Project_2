<?php
// LOGIN USER
	include('dbconnect.php');
	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$quantity = mysqli_real_escape_string($DBConnect, $_POST['quantity']);
		
		$productID = $_SESSION['productID'];
		
		$get_quantity = "SELECT * from products WHERE productID='$productID'";
		
		$get_quantity_result = mysqli_query($DBConnect, $get_quantity);
		
		$database_quantity = mysqli_fetch_assoc($get_quantity_result);
		
		$database_quantity_primitive = $database_quantity['productQuantity'];
		
		$database_productName_primitive = $database_quantity['productName'];
		
		if($quantity <= $database_quantity_primitive && $quantity >= 0){
			$add_order_query = "INSERT INTO orders (productName, quantity, date) VALUES ('$database_productName_primitive', '$quantity', '".date('d-m-Y')."')";
			mysqli_query($DBConnect, $add_order_query) or die ("<p>Unable to insert into the table.</p>"."<p>Error code " .mysqli_errno($DBConnect). ": " .mysqli_error($DBConnect)). "</p>";
			$update_product_quantity = "UPDATE products SET productQuantity = '$database_quantity_primitive' - '$quantity' WHERE productID = '$productID'";
			mysqli_query($DBConnect, $update_product_quantity);
			header('location: inventory.php');
		}
			else{
				array_push($errors, "Invalid quantity");
			}
	}
?>