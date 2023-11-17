<?php
//for include("") method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");

$productName=$_POST['productName_input'];
$P_subCategoryID=$_POST['P_sub-categoryID_input'];
$productDescription=$_POST['productDescription_input'];
	$productImage=$_FILES['productImage_input']['name']; //file uploaded name
	$productImage_tmp_name=$_FILES['productImage_input']['tmp_name'];
	$unitPrice=$_POST['unitPrice_input'];
	$availableQty=$_POST['availableQty_input'];
	$datime=date("Y-m-d")." ".date("H:i:s:v");

	session_start();

if($_GET["action"] == "edit"){
	$sql="UPDATE `product` SET `product_name`='$productName',`product_description`='$productDescription',`unit_price`='$unitPrice',`available_quantity`='$availableQty',`subcategory_id`='$P_subCategoryID',`updated_at`='$datime' WHERE `product_id`='".$_GET["id"]."'";
}else{
	$sql="INSERT INTO `product`(`product_name`, `product_description` , `unit_price`, `available_quantity`, `subcategory_id`, `created_at`, `updated_at`, `added_by`) VALUES ('$productName','$productDescription','$unitPrice','$availableQty','$P_subCategoryID','$datime','$datime','".$_SESSION['USERID']."')";
}
	
	$productid="SELECT `product_id` FROM `product` WHERE `product_name`='$productName' && `product_description`='$productDescription' && `unit_price`='$unitPrice' && `available_quantity`='$availableQty' && `subcategory_id`='$P_subCategoryID'";	

		if(mysqli_query($conn,$productid)){
			$productid_res=mysqli_query($conn,$productid);

			if(mysqli_num_rows($productid_res) == 0){

				if(mysqli_query($conn,$sql)){
					echo '<script>alert("Product Added Successfully.")</script>';
					echo '<script>window.location="Admin page.php"</script>';

					$productid_res2=mysqli_query($conn,$productid);
					$id = mysqli_fetch_assoc($productid_res2);
					$idinput = $id["product_id"];
					$folder = "Images/".$productImage;
					move_uploaded_file($productImage_tmp_name, $folder);

					if($_GET["action"] == "edit"){
						$sql2 = "UPDATE `productimages` SET `product_image`='$folder',`updated_at`='$datime' WHERE `product_id`='".$_GET["id"]."'";
					}else{
						$sql2 = "INSERT INTO `productimages`(`product_image`, `product_id`, `created_at`, `updated_at`, `added_by`) VALUES ('$folder','$idinput','$datime','$datime','".$_SESSION['USERID']."')";
					}

					if(mysqli_query($conn,$sql2)){
						echo "product image added successfully.<br>";
						echo '<script>window.location="Admin page.php"</script>';
					}else{
					//echo "Error product image not added. ".mysqli_error($conn);
					echo '<script>alert("Error product image not added. '.mysqli_error($conn).'")</script>';
					echo '<script>window.location="Admin page.php"</script>';
					}
				}else{
					//echo "Error product not added. ".mysqli_error($conn);
					echo '<script>alert("Error product not added. '.mysqli_error($conn).'")</script>';
					echo '<script>window.location="Admin page.php"</script>';
				}
			}else{
				//echo "Duplicate record in products.";
				echo '<script>alert("Duplicate record in products.")</script>';
				echo '<script>window.location="Admin page.php"</script>';
			}
		}else{
			//echo "product id fetch query error.";
			echo '<script>alert("product id fetch query error.")</script>';
			echo '<script>window.location="Admin page.php"</script>';
		}
        //header("location:Home page.php"); //to open a new php page.
		//die();                            //to stop current php execution.


	?>