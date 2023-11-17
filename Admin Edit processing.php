<?php
//for include("") method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");
?>
<html>
	<head>
		<title>Admin Page</title>
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

<?php

	if ($_GET["action"] == "editUser"){
		$sql="SELECT `User_ID`, `Email`, `User_FName`, `User_LName`, `Gender`, `Password`, `role` FROM `users` WHERE `User_ID`= '".$_GET['user']."'";
	 	$result=mysqli_query($conn,$sql);

	 	$Roles= "SELECT `role_id`, `role_name` FROM `roles`";
	 	$Roles_res=mysqli_query($conn,$Roles);

	 	$result_row = mysqli_fetch_assoc($result);
?>

<fieldset id="UserEditdataFormAdmin" class="form">
				<legend id="Legend">Edit User</legend>
				<form action="User SignUp Processing.php?action=editUserData&user=<?php echo $result_row["User_ID"]; ?>" method="post">
					<label for="FirstName">First Name</label>
					<input type="text" id="FirstName" name="userFname_input" required value="<?php echo $result_row['User_FName']; ?>"><br><br>

					<label for="LastName">Last Name</label>
					<input type="text" id="LastName" name="userLname_input" required value="<?php echo $result_row['User_LName']; ?>"><br><br>
					
					<label for="userGender">Gender</label>
					<span id="userGender">
						<input type="radio" id="userMale" required name="userGender_input" value="Male">
						<label for="userMale">Male</label>
						<input type="radio" id="userFemale" required name="userGender_input" value="Female">
						<label for="userFemale">Female</label>
					</span><br><br>
					
					<label for="userRole">Role</label>
					<select id="UserRole" name="userRole_input" required>
						<?php 
       					// use a while loop to fetch data from the $Cat_row variable (sql result) and individually display as an option using while loop
       					// syntax
       					//while (condition):
       					// statements;
       					//endwhile;
    					while ($Roles_row = mysqli_fetch_assoc($Roles_res)): ?>   	
	    					<option value="<?php echo $Roles_row["role_id"];?>">
	    						<?php echo $Roles_row["role_name"];?>
	    					</option>
						<?php endwhile; ?>
						<!-- value="?php echo $Roles_row["subcategory_id"];?" : The value of input set to the primary key -->
    					<!-- echo $Roles_row["category_name"]; To show the category name to the user instead of id -->
					</select><br><br>

					<label for="UserEmail">E-mail</label>
					<input type="Email" id="UserEmail" name="userEmail_input" required value="<?php echo $result_row['Email']; ?>"><br><br>					
			
					<label for="userPassword">Password</label>
					<input type="Password" id="userPassword" name="userPass_input" required value="<?php echo $result_row['Password']; ?>"><br><br>
					
					<button type="submit" id="SignUpButton" value="Register" name="reg_btn">Save User</button>
				</form>
			</fieldset>

<?php
	}else if($_GET["action"] == "editProduct"){
		$sql2="SELECT product.`product_id`, product.`product_name`, product.`product_description`, product.`unit_price`, product.`available_quantity`, subcategories.`subcategory_name`, productimages.`product_image` FROM ((`product`INNER JOIN `productimages` ON product.product_id = productimages.product_id) INNER JOIN `subcategories` ON product.subcategory_id = subcategories.subcategory_id) WHERE product.product_id = '".$_GET["id"]."'";

	 	$result2=mysqli_query($conn,$sql2);

	 	

		$Sub_Category="SELECT `subcategory_id`, `subcategory_name`FROM `subcategories` ";
		$Sub_Category_res=mysqli_query($conn,$Sub_Category);

		$result_row2 = mysqli_fetch_assoc($result2);
?>

<fieldset id="ProductFormAdmin" class="form">                
				<legend id="Legend">Edit Product</legend> 
															         <!--It specifies which content-type to use when submitting the form-->   
				<form action="User Product Processing.php?action=edit&id=<?php echo $result_row2['product_id']; ?>" method="post" enctype="multipart/form-data">
					<label for="ProductName">Product Name</label>
					<input type="text" id="ProductName" name="productName_input" required value="<?php echo $result_row2['product_name']; ?>"><br><br>
					
					<label for="productDescription">Product Description</label>
					<input type="text" id="productDescription" name="productDescription_input" required value="<?php echo $result_row2['product_description']; ?>"><br><br>

					<label for="ProductImage">Product Image</label>
					<input type="file" id="ProductImage" name="productImage_input" required><br><br>

					<label for="unitPrice">Unit Price</label>
					<input type="text" id="unitPrice" name="unitPrice_input" required value="<?php echo $result_row2['unit_price']; ?>"><br><br>

					<label for="availableQty">Available Quantity</label>
					<input type="number" id="availableQty" name="availableQty_input" required value="<?php echo $result_row2['available_quantity']; ?>"><br><br>

					<label for="P_Sub-CategoryID">Sub-Category ID</label>
					<select id="P_Sub-CategoryID" name="P_sub-categoryID_input" required>
						<?php 
       					// use a while loop to fetch data from the $Cat_row variable (sql result) and individually display as an option using while loop
       					// syntax
       					//the normal syntax for wile loop
       					while ($Sub_Cat_row = mysqli_fetch_assoc($Sub_Category_res)){ ?>   	
	    					<option value="<?php echo $Sub_Cat_row["subcategory_id"];?>">
	    						<?php echo $Sub_Cat_row["subcategory_name"];?>
	    					</option>
						<?php } ?>
						<!-- value="?php echo $Sub_Cat_row["subcategory_id"];?" : The value of input set to the primary key -->
    					<!-- echo $Sub_Cat_row["category_name"]; To show the category name to the user instead of id -->
					</select><br><br>
					
					<button type="submit" id="ProductButton" value="Product" name="Product_btn">Add Product</button>
				</form>
			</fieldset>

<?php

	}
?>