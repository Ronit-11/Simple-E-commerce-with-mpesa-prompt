<?php 
//for include method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");

//    print_r($_POST);
//     r for printing an array

    $email=$_POST['userLoginEmail_input'];
    $pass=$_POST['userLoginPass_input'];  

    $credentials_check = "SELECT * FROM `users` WHERE `Email`='$email' AND `Password`='$pass'";
                                                                                    // role id 1 is for admins.
    $admin_check = "SELECT * FROM `users` WHERE `Email`='$email' AND `Password`='$pass' AND `role`='1'";
    
    if(mysqli_query($conn, $credentials_check) && mysqli_query($conn, $admin_check)){
        $admin_check_result = mysqli_query($conn, $admin_check); 
        $credentials_check_result = mysqli_query($conn, $credentials_check);

    }else{
        echo "Error".mysqli_error($conn);
        die();
    }
    
    if(mysqli_num_rows($credentials_check_result) == 1){

        //getting user id and name from credentials.
        $row = mysqli_fetch_assoc($credentials_check_result);
        session_start();
        $_SESSION['USERID'] = $row["User_ID"];
        $_SESSION['USERNAME'] = $row["User_FName"]."  ".$row["User_LName"];

        if(mysqli_num_rows($admin_check_result) == 1){
            header("location:Admin page.php");
            die();
        }
        header("location:Logged In Home page.php"); //to open a new php page.
        die();                                      //to stop current php execution.
    }else{
        echo '<script>alert("Incorrect E-mail/password.")</script>';
        echo '<script>window.location="Login page.php"</script>';
    }  
 ?>