<?php
//for include method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");

	session_start();
    $productID=$_GET["id"];

    $check = "SELECT * FROM `cart` WHERE `customer_id`='".$_SESSION['USERID']."' && `product_id`='".$_GET['id']."'";
 	$cart = "INSERT INTO `cart`(`customer_id`, `product_id`, `quantity`) VALUES ('".$_SESSION['USERID']."','".$_GET['id']."','1')";

if(mysqli_query($conn,$check)){
	$result=mysqli_query($conn,$check);
	if(mysqli_num_rows($result) == 0){
	 	if(mysqli_query($conn,$cart)){
	        echo '<script>alert("Product is Added to Cart")</script>';
       		//header("location:".$_GET['page']);
            echo '<script>window.location="'.$_GET["page"].'"</script>';
	    }else{
	        echo "Error".mysqli_error($conn);
	    }
	}else{
		echo '<script>alert("Product is already Added to Cart")</script>';
       // header("location:".$_GET['page']);
        echo '<script>window.location="'.$_GET["page"].'"</script>';
	}
}else{
    echo "Error".mysqli_error($conn);
}
?>