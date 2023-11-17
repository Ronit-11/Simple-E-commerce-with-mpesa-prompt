<?php
//for include("") method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");

	$catName=$_POST['categoryName_input'];

	$sql="INSERT INTO `categories`(`category_name`) VALUES ('$catName')";

	if(mysqli_query($conn,$sql)){
        echo "Category Added Successfully.";
        //header("location:Home page.php"); //to open a new php page.
		//die();                            //to stop current php execution.
    }else{
        echo "Error".mysqli_error($conn);
    }

?>