<?php
//for include method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");
?>
<html>
	<head>
		<title>Women Wear Page</title>
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
				<a href="Login page.php" id="loginpage" class="topRight">login</a>
				<a href="Sign Up page.php" id="Signuppage" class="topRight">Sign Up</a>       
				<a href="id or class of bottom page as written in css" id="Contactus" class="topRight">Contact Us</a>
			</div>

			<div id="navigationbar">
				<a href="Home page.php" id="Homepage" class="navbar">Home</a>
				<a href="Men Wear page.php" id="Menwearpage" class="navbar">Men Wear</a> 
				<a href="Women Wear page.php" id="Womenwearpage" class="navbar">Women wear</a>
				<a href="Child Wear page.php" id="Childwearpage" class="navbar">Child wear</a> 
			</div>

			<div>
				<img src="Images/brandLogo.png" id="brandlogos" alt="Our trusted clothing partners">
			</div>
		</header>

		<div class="images">
			<?php
            $query = "SELECT product.`product_id`, product.`product_name`, product.`product_description`, product.`unit_price`, product.`available_quantity`, productimages.`product_image`FROM `product`INNER JOIN `productimages` ON product.product_id = productimages.product_id WHERE `subcategory_id` LIKE '%2'";

            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <div class="product">
                    	<img src="<?php echo $row['product_image']; ?>" alt="Product Image" class="productImage">
                        <label class="productName"><?php echo $row["product_name"]; ?></label><br>
                        <label class="productPrice">$ <?php echo number_format($row["unit_price"], 2); ?></label><br>
                        <input type="submit" name="add" class="productCartButton" value="Add to Cart">
                    </div>
        <?php
                }
            }
        ?>
		</div>
	</body>
</html>