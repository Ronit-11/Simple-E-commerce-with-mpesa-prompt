<?php
//for include("") method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");
	session_start();
?>
<html>
	<head>
		<title>User Cart History Page</title>
		<link rel="stylesheet" href="E-COMMERCE CSS.css">
		<link rel = "icon" href ="Images/Icon.jpg" type ="image/x-icon">
	</head>

	<body class="allpages">
		<header id="header">
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
				<a id="username" class="topRight"><?php echo $_SESSION['USERNAME'];?></a>
				<a href="Cart Page.php" id="Mycartpage" class="topRight">My Cart</a>
				<a href="Home page.php" id="Logoutpage" class="topRight">Log Out</a>       
				<a href="id or class of bottom page as written in css" id="Contactus" class="topRight">Contact Us</a>
			</div>

			<div id="navigationbar">
				<a href="Logged In Home page.php" id="Homepage" class="navbar">Home</a>
				<a href="Logged In Men Wear page.php" id="Menwearpage" class="navbar">Men Wear</a> 
				<a href="Logged In Women Wear page.php" id="Womenwearpage" class="navbar">Women wear</a>
				<a href="Logged In Child Wear page.php" id="Childwearpage" class="navbar">Child wear</a> 
			</div>

			<div>
				<img src="Images/brandLogo.png" id="brandlogos" alt="Our trusted clothing partners">
			</div>
		</header>

		<?php
			$check="SELECT orderdetails.`orderdetails_total`, orderdetails.`product_price`, orderdetails.`order_quantity`, `order`.`order_id`, `order`.`order_amount`, product.`product_name`, product.`product_description` FROM (((`orderdetails` INNER JOIN `order` ON order.order_id = orderdetails.order_id) INNER JOIN `users` ON order.customer_id = users.User_ID) INNER JOIN `product` ON orderdetails.product_id = product.product_id) WHERE users.`User_ID`='".$_SESSION['USERID']."'";

			if(mysqli_query($conn,$check)){
				$resultCheck=mysqli_query($conn,$check);
				$result=mysqli_query($conn,$check);

				if(mysqli_fetch_assoc($resultCheck)>0){
		?>

		<table id="ordersData">
			<thead>
				<th>Order ID</th>      
				<th>Product Name and Description</th>  
				<th>Price/Unit</th>   
				<th>Order Quantity</th>   
				<th>Sub Total</th>  
				<th>Grand Total</th>  
			</thead>
			<tbody>
				<?php
					/*mysqli_fetch_assoc($result) it fetches the first(only one) row data in defined variable, not all rows data together*/
					while ($value = mysqli_fetch_assoc($result)) {	
				?>
				<tr>
					<td class="orderId"><?php echo $value["order_id"]; ?></td>
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
		<?php
                }else{        	
                	echo '<h1 id="noItemBought">NO ITEMS Bought!</h1>';   	
                }
            }else{
			    echo "Error".mysqli_error($conn);
			}
                ?>
	</body>
</html>