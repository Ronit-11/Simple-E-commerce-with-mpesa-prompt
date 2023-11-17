<?php
//for include("") method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");
	
	$subCatName=$_POST['sub-categoryName_input'];
	$catID=$_POST['category_input'];

	$sql="INSERT INTO `subcategories`(`subcategory_name`, `category`) VALUES ('$subCatName','$catID')";
	
	if(mysqli_query($conn,$sql)){
		echo "Sub-Category Added Successfully.";
		//header("location:Home page.php"); //to open a new php page.
		//die();                            //to stop current php execution.
    }else{
        echo "Error".mysqli_error($conn);
    }
?>