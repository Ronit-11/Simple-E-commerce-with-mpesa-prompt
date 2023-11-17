<?php
//for include method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");

session_start();
$userId=$_SESSION['USERID'];

?>
<html>
	<head>
		<title>My Cart Page</title>
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
				<a href="Cart History page.php" id="CartHistorypage" class="topRight">Cart History</a>
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
			$check = "SELECT product.`product_name`, product.`unit_price`, cart.`quantity`, product.`product_id`,productimages.`product_image` FROM ((`product`INNER JOIN `cart` ON product.product_id = cart.product_id) INNER JOIN `productimages` ON product.product_id = productimages.product_id) WHERE `customer_id`='".$_SESSION['USERID']."'";

			if(mysqli_query($conn,$check)){
				$resultCheck=mysqli_query($conn,$check);
				$result=mysqli_query($conn,$check);
				
				$total = 0;
				if(mysqli_fetch_assoc($resultCheck)>0){
		?>

		<table id="userCartData">
			<thead>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Price/Unit</th>
				<th>Total Price</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					while ($data=mysqli_fetch_assoc($result)) {
						$_SESSION['quantity']=$data["quantity"];
						$_SESSION['product_id']=$data['product_id'];
						
                ?>
                        <tr class="cartRow">

                            <td><p id="cartProductName"><?php echo $data["product_name"]; ?></p>
                            	<img src="<?php echo $data['product_image']; ?>" id="cartProductPicture">
                            </td>
                            <td>
                            	<a href="Cart Remove Processing.php?action=minus&id=<?php echo $data['product_id']; ?>&qty=<?php echo $data['quantity']; ?>" id="minus"><span id="minusUp"><b>-</b></span></a>
                            	<P id="qty"><?php echo $data["quantity"];?></P>
                            	<a href="Cart Remove Processing.php?action=add&id=<?php echo $data['product_id']; ?>&qty=<?php echo $data['quantity']; ?>" id="plus"><span><b>+</b></span></a>
                        	</td>
                            <td>$ <?php echo number_format($data["unit_price"], 2); ?></td>

                            <td>$ <?php echo number_format($data["quantity"] * $data["unit_price"], 2); ?></td>
                            <td><a href="Cart Remove Processing.php?action=remove&id=<?php echo $data['product_id']; ?>" id="cartRemove">Remove Item</td>
                        </tr>
                        <?php
                        $total = $total + ($data["quantity"] * $data["unit_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right" class="Total">Total</td>
                            <td colspan="2" align="center" class="Total"><u>$ <?php echo number_format($total, 2); ?></u></td>
                        </tr>
			</tbody>
		</table>
		<?php
                }else{        	
                	echo '<h1 id="noItemInCart">NO ITEMS IN CART!</h1>';    	
                }
            }else{
			    echo "Error".mysqli_error($conn);
			}
                ?>

		<div id="cartSummary">
			<p id="cartSumm">Cart Summary</p>
			<p id="cartSummSubtotal">Subtotal </p>
			<p id="totalToLeft">$ <?php echo number_format($total, 2); ?></p><br>
			<?php $_SESSION['total']=number_format($total, 2); ?>
			<form action="Mpesa processing.php?action=order&total=<?php echo $total; ?>" method="post">
				<button id="checkoutButton">Checkout  ($ <?php echo number_format($total, 2); ?>)</button>
			</form>
		</div>
	</body>
</html>