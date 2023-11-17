<?php
//for include method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");

    session_start();

    if (isset($_GET["action"])){
        if ($_GET["action"] == "add"){
        	$_GET["qty"]=number_format($_GET["qty"]+1);
        	$sql="UPDATE `cart` SET `quantity`='".$_GET['qty']."' WHERE `customer_id`='".$_SESSION['USERID']."' && `product_id`='".$_GET['id']."'";
        	echo $sql;
        }else if ($_GET["action"] == "minus"){
            if(number_format($_GET["qty"]>1)){
                $_GET["qty"]=number_format($_GET["qty"]-1);
                $sql="UPDATE `cart` SET `quantity`='".$_GET['qty']."' WHERE `customer_id`='".$_SESSION['USERID']."' && `product_id`='".$_GET['id']."'";
            }else{
                header("location:Cart Page.php");
                die();
            }	
        }else if($_GET["action"] == "remove"){
            $sql="DELETE FROM `cart` WHERE `customer_id`='".$_SESSION['USERID']."' && `product_id`='".$_GET['id']."'";
        }
        mysqli_query($conn,$sql);
        header("location:Cart Page.php");
        die();
    }
    echo "2";
?>