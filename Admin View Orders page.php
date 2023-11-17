<?php
//for include("") method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");
	
	$sql="SELECT orderdetails.`orderdetails_total`, orderdetails.`product_price`, orderdetails.`order_quantity`, `order`.`order_id`, `order`.`order_amount`, users.`User_ID`, users.`User_FName`, users.`User_LName`, product.`product_name`, product.`product_description` FROM (((`orderdetails` INNER JOIN `order` ON order.order_id = orderdetails.order_id) INNER JOIN `users` ON order.customer_id = users.User_ID) INNER JOIN `product` ON orderdetails.product_id = product.product_id)";

	$result=mysqli_query($conn,$sql);
?>
	<html>
	<head>
		<title>Admin View Orders Page</title>
		<link rel="stylesheet" href="E-COMMERCE CSS.css">
		<link rel = "icon" href ="Images/Icon.jpg" type ="image/x-icon">
	</head>

	<body class="allpages" id="AdminPage">

		<header id="headerAdmin">
			<img src="Images/logo.jpg" id="Logo" alt="Our Logo">

			<div id="socialmedia">			
				<a href="https://www.instagram.com/" id="Instagram" target=_blank><img src="Images/insta.png" class="socialmedia" id="instasmall"></a>
				<a href="https://www.facebook.com/" id="Facebook" target=_blank><img src="Images/facebook.png" class="socialmedia"></a>
				<a href="https://www.whatsapp.com/" id="Whatsapp" target=_blank><img src="Images/whatsapp.png" class="socialmedia"></a>
				<a href="https://twitter.com/" id="Twitter" target=_blank><img src="Images/twitter.png" class="socialmedia"></a>
			</div>

			<div id="searchbar">
				<img src="Images/Search.png" id="searchicon">
				<input type="text" id="searchedcloth" name="clothsearch" placeholder="Search for">
		    </div>

			<img src="Images/easy-returns.gif" id="return" alt="return policy image">

			<div id="top_right">
				<a id="usernameAdmin" class="topRight"><?php session_start(); echo $_SESSION['USERNAME'];?></a>
				<a href="Home page.php" id="LogoutpageAdmin" class="topRight">Log Out</a>       
			</div>

			<div id="navigationbar">
				<a href="Admin page.php" id="Addpage" class="navbar">Add</a>
				<a href="Admin View Products page.php" id="AdminViewProducts" class="navbar">View Products</a> 
				<a href="Admin View Users page.php" id="AdminViewUsers" class="navbar">View Users</a>
				<a href="Admin View Orders page.php" id="AdminViewOrders" class="navbar">View Orders</a> 
			</div>
		</header>

		<table id="ordersData">
			<thead>
				<th>Order ID</th> 
				<th>User ID</th>   
				<th>User Name</th>   
				<th>Product Name and Description</th>  
				<th>Price/Unit</th>   
				<th>Quantity</th>   
				<th>Sub Total</th>  
				<th>Grand Total</th>  
			</thead>
			<tbody>
				<?php
					/*mysqli_fetch_assoc($result) it fetches the first(only one) row data in defined variable, not all rows data together*/
					while ($value=mysqli_fetch_assoc($result)) {	
				?>
				<tr>
					<td class="orderId"><?php echo $value["order_id"]; ?></td>
					<td><?php echo $value["User_ID"]; ?></td>
					<td><?php echo $value["User_FName"]." ".$value["User_LName"]; ?></td>
					<td><?php echo $value["product_name"]." : ".$value["product_description"]; ?></td>
					<td><?php echo "$ ".number_format($value["product_price"], 2); ?></td>
					<td><?php echo $value["order_quantity"]; ?></td>
					<td><?php echo "$ ".number_format($value["orderdetails_total"], 2); ?></td>
					<td><?php echo "$ ".number_format($value["order_amount"], 2); ?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>

	</body>
	</html>