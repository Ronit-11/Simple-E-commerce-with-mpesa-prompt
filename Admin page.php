<?php
//for include("") method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");

	$Category ="SELECT `category_id`, `category_name` FROM `categories`";
	$Sub_Category="SELECT `subcategory_id`, `subcategory_name`FROM `subcategories` ";
	$Roles= "SELECT `role_id`, `role_name` FROM `roles`";
	if(mysqli_query($conn,$Sub_Category) && mysqli_query($conn,$Category) && mysqli_query($conn,$Roles)){
		$Sub_Category_res=mysqli_query($conn,$Sub_Category);
		$Category_res=mysqli_query($conn,$Category);
		$Roles_res=mysqli_query($conn,$Roles);
// even for roles	
    }else{
        echo "Error".mysqli_error($conn);
    }

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

		<fieldset id="UserdataFormAdmin" class="form">
				<legend id="Legend">Add User</legend>
				<form action="User SignUp Processing.php" method="post">
					<label for="FirstName">First Name</label>
					<input type="text" id="FirstName" name="userFname_input" required placeholder="Enter First Name"><br><br>

					<label for="LastName">Last Name</label>
					<input type="text" id="LastName" name="userLname_input" required placeholder="Enter Last Name"><br><br>
					
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
					<input type="Email" id="UserEmail" name="userEmail_input" required placeholder="Enter Email"><br><br>					
			
					<label for="userPassword">Password</label>
					<input type="Password" id="userPassword" name="userPass_input" required placeholder="Enter Password"><br><br>
					
					<button type="submit" id="SignUpButton" value="Register" name="reg_btn">Add User</button>
				</form>
			</fieldset>

			<fieldset id="ProductFormAdmin" class="form">                
				<legend id="Legend">Add a Product</legend> 
															         <!--It specifies which content-type to use when submitting the form-->   
				<form action="User Product Processing.php" method="post" enctype="multipart/form-data">
					<label for="ProductName">Product Name</label>
					<input type="text" id="ProductName" name="productName_input" required placeholder="Enter Product Name"><br><br>
					
					<label for="productDescription">Product Description</label>
					<input type="text" id="productDescription" name="productDescription_input" required placeholder="Enter Product Description"><br><br>

					<label for="ProductImage">Product Image</label>
					<input type="file" id="ProductImage" name="productImage_input" required><br><br>

					<label for="unitPrice">Unit Price</label>
					<input type="text" id="unitPrice" name="unitPrice_input" required placeholder="Enter Unit Price"><br><br>

					<label for="availableQty">Available Quantity</label>
					<input type="number" id="availableQty" name="availableQty_input" required placeholder="Enter Available Quantity"><br><br>

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

			<fieldset id="CategoryFormAdmin" class="form">
				<legend id="Legend">Create a Category</legend>
				<form action="Category Processing.php" method="post">
					<label for="CategoryName">Category Name</label>
					<input type="text" id="CategoryName" name="categoryName_input" required placeholder="Enter Category Name"><br><br>
					
					<button type="submit" id="CategoryButton" value="Category" name="category_btn">Add Category</button>
				</form>
			</fieldset>

			<fieldset id="SubCategoryFormAdmin" class="form">
				<legend id="Legend">Create a Sub-Category</legend>
				<form action="Sub-Category Processing.php" method="post">
					<label for="Sub-CategoryName">Sub-Category Name</label>
					<input type="text" id="Sub-CategoryName" name="sub-categoryName_input" required placeholder="Enter Sub-Category Name"><br><br>

					<label for="Category">Category</label>
					<select id="Category" name="category_input" required>
					<?php 
    					// use a while loop to fetch data from the $Cat_row variable (sql result) and individually display as an option using while loop
    					while ($Cat_row = mysqli_fetch_assoc($Category_res)):; ?>   	
	    					<option value="<?php echo $Cat_row["category_id"];?>">
	    						<?php echo $Cat_row["category_name"];?>
	    					</option>
					<?php endwhile; ?>
					<!-- value="?php echo $Cat_row["subcategory_id"];?" : The value of input set to the primary key -->
    				<!-- echo $Cat_row["category_name"]; To show the category name to the user instead of id -->
					</select><br><br>
					
					<button type="submit" id="Sub-CategoryButton" value="Sub-Category" name="sub-category_btn">Add Sub-Category</button>
				</form>
			</fieldset>

	</body>
	</html>