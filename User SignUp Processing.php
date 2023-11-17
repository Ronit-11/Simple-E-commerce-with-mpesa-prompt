<?php 
//for include("") method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");

    $fName=$_POST['userFname_input'];
    $lName=$_POST['userLname_input'];
    $gender=$_POST['userGender_input'];
    $role=$_POST['userRole_input'];
    $email=$_POST['userEmail_input'];
    $pass=$_POST['userPass_input'];

    $sql="INSERT INTO `users`(`Email`, `User_FName`, `User_LName`, `Gender`, `Password`, `role`) VALUES ('$email','$fName','$lName','$gender','$pass','$role')";

    $sql2="UPDATE `users` SET `Email`='$email',`User_FName`='$fName',`User_LName`='$lName',`Gender`='$gender',`Password`='$pass',`role`='$role' WHERE `User_ID`='".$_GET["user"]."'";
    if ($_GET["action"] == "editUserData"){
        if(mysqli_query($conn,$sql2)){
            //echo "User registered Successfully.";
            echo '<script>alert("User Data Edited Successfully.")</script>';
            echo '<script>window.location="Admin View Users page.php"</script>';
            //header("location:Login page.php"); //to open a new php page.
            //die();                             //to stop current php execution.
        }else{
            //echo "Error".mysqli_error($conn);
            echo '<script>alert("Error : '.mysqli_error($conn).'")</script>';
        }
    }else{
        if(mysqli_query($conn,$sql)){
            //echo "User registered Successfully.";
            echo '<script>alert("User registered Successfully.")</script>';
            echo '<script>window.location="Login page.php"</script>';
            //header("location:Login page.php"); //to open a new php page.
            //die();                             //to stop current php execution.
        }else{
            //echo "Error".mysqli_error($conn);
            echo '<script>alert("Error : '.mysqli_error($conn).'")</script>';
            echo '<script>window.location="Sign Up page.php"</script>';
        }
    }
 ?>