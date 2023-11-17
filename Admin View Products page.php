<?php
//for include("") method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");
	
	$sql="SELECT product.`product_id`, product.`product_name`, product.`product_description`, product.`unit_price`, product.`available_quantity`, subcategories.`subcategory_name`, productimages.`product_image` FROM ((`product`INNER JOIN `productimages` ON product.product_id = productimages.product_id) INNER JOIN `subcategories` ON product.subcategory_id = subcategories.subcategory_id);";
	$result=mysqli_query($conn,$sql);
?>

	<html>
	<head>
		<title>Admin View Products Page</title>
		<link rel="stylesheet" href="E-COMMERCE CSS.css">
		<link rel = "icon" href ="Images/Icon.jpg" type ="image/x-icon">
	</head>

	<body class="allpages" id="AdminViewProductsPage">

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

		<table id="productsData">
			<thead>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Product Description</th>
				<th>Price/Unit</th>
				<th>Stock Available</th>
				<th>Subcategory</th>
				<th>Product Image</th>
				<th colspan="2">Action</th>
			</thead>
			<tbody>
				<?php
					/*mysqli_fetch_assoc($result) it fetches the first(only one) row data in defined variable, not all rows data together*/
					while ($value=mysqli_fetch_assoc($result)) {	
				?>
				<tr>
					<td class="productId"><?php echo $value["product_id"]; ?></td>
					<td><?php echo $value["product_name"]; ?></td>
					<td><?php echo $value["product_description"]; ?></td>
					<td><?php echo "$ ".number_format($value["unit_price"], 2); ?></td>
					<td><?php echo $value["available_quantity"]; ?></td>
					<td><?php echo $value["subcategory_name"]; ?></td>
					<td><?php echo $value["product_image"]; ?></td>
					<form action="Admin Remove processing.php?action=product&id=<?php echo $value['product_id']; ?>" method="post">
					<td><button>Remove</button></td>
					</form>
					<form action="Admin Edit processing.php?action=editProduct&id=<?php echo $value["product_id"]; ?>" method="post">
					<td><button>Edit</button></td>
					</form>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>

	</body>
	</html>