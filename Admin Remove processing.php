<?php
//for include method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");

if($_GET['action']=="product"){

	$removeProduct1="DELETE FROM `productimages` WHERE `product_id`='".$_GET['id']."'";
	$removeProduct2="DELETE FROM `cart` WHERE `User_ID`='".$_GET['id']."'";
	$removeProduct3="DELETE FROM `product` WHERE `product_id`='".$_GET['id']."'";

	if(mysqli_query($conn,$removeProduct1) && mysqli_query($conn,$removeProduct2)){
		if(mysqli_query($conn,$removeProduct3)){
			echo '<script>alert("Product removed succesfully.")</script>';
        	echo '<script>window.location="Admin View Products page.php"</script>';
        }else{
 	    	echo "Error".mysqli_error($conn);
		}
	}else{
 	   echo "Error".mysqli_error($conn);
	}
}else if($_GET['action']=="user"){

	$removeUser1="DELETE FROM `cart` WHERE `customer_id`='".$_GET['user']."'";
	$removeUser2="DELETE FROM `users` WHERE `User_ID`='".$_GET['user']."'";

	if(mysqli_query($conn,$removeUser1)){
		if(mysqli_query($conn,$removeUser2)){
			echo '<script>alert("User removed succesfully.")</script>';
	        echo '<script>window.location="Admin View Users page.php"</script>';
	    }else{
	 	   echo "Error".mysqli_error($conn);
		}
	}else{
		echo "Error".mysqli_error($conn);
	}
}
?>