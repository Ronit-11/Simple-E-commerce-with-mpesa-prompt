<?php
// Initialize the variables
session_start();
//for include method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");


if($_SESSION['total']>0){
    $consumer_key = ''; //get these details from daraja api
    $consumer_secret = '';              //get these details from daraja api
    $Business_Code = '';                          //get these details from daraja api or use random numbers for sanbox
    $Passkey = '';  //get these details from daraja api
    $Type_of_Transaction = 'CustomerPayBillOnline';
    $Token_URL = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    $phone_number = '';       // phone number of the buyer(to be sent mpesa stk push) with country code ie 254xxxxxxxxx
    $OnlinePayment = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    $total_amount = '';   //amount to be charged
    $CallBackURL = '';   //redirect url after mpesa prompt is sent
    $Time_Stamp = date("Ymdhis");
    $password = base64_encode($Business_Code . $Passkey . $Time_Stamp);

    $curl_Tranfer = curl_init();
    curl_setopt($curl_Tranfer, CURLOPT_URL, $Token_URL);
    $credentials = base64_encode($consumer_key . ':' . $consumer_secret);
    curl_setopt($curl_Tranfer, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials));
    curl_setopt($curl_Tranfer, CURLOPT_HEADER, false);
    curl_setopt($curl_Tranfer, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_Tranfer, CURLOPT_SSL_VERIFYPEER, false);
    $curl_Tranfer_response = curl_exec($curl_Tranfer);

    $token = json_decode($curl_Tranfer_response)->access_token;

    $curl_Tranfer2 = curl_init();
    curl_setopt($curl_Tranfer2, CURLOPT_URL, $OnlinePayment);
    curl_setopt($curl_Tranfer2, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token));

    $curl_Tranfer2_post_data = [
        'BusinessShortCode' => $Business_Code,
        'Password' => $password,
        'Timestamp' =>$Time_Stamp,
        'TransactionType' =>$Type_of_Transaction,
        'Amount' => $total_amount,
        'PartyA' => $phone_number,
        'PartyB' => $Business_Code,
        'PhoneNumber' => $phone_number,
        'CallBackURL' => $CallBackURL,
        'AccountReference' => 'Fashion Club',
        'TransactionDesc' => 'Clothes',
    ];

    $data2_string = json_encode($curl_Tranfer2_post_data);

    curl_setopt($curl_Tranfer2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_Tranfer2, CURLOPT_POST, true);
    curl_setopt($curl_Tranfer2, CURLOPT_POSTFIELDS, $data2_string);
    curl_setopt($curl_Tranfer2, CURLOPT_HEADER, false);
    curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl_Tranfer2, CURLOPT_SSL_VERIFYHOST, 0);
    $curl_Tranfer2_response = json_decode(curl_exec($curl_Tranfer2));

    echo json_encode($curl_Tranfer2_response, JSON_PRETTY_PRINT);

    //order processing for database ------------------------------------------------------------------------------------------
    $datime = date("Y-m-d")." ".date("H:i:s:v");

    $check = "SELECT product.`product_name`, product.`unit_price`, cart.`quantity`, product.`product_id`,productimages.`product_image` FROM ((`product`INNER JOIN `cart` ON product.product_id = cart.product_id) INNER JOIN `productimages` ON product.product_id = productimages.product_id) WHERE `customer_id`='".$_SESSION['USERID']."'";

    $order = "INSERT INTO `order`(`customer_id`, `order_amount`, `order_status`, `created_at`, `payment_type`, `updated_at`) VALUES ('".$_SESSION['USERID']."','".$_GET['total']."','paid','$datime','156235','$datime')";

    $orderCheck = "SELECT `order_id` FROM `order` WHERE `customer_id`='".$_SESSION['USERID']."' && `order_amount`='".$_GET['total']."' && `created_at`='$datime'";

    $checkResult = mysqli_query($conn,$check);
    if(mysqli_query($conn,$order) && mysqli_query($conn,$check)){  
    }else{
        echo "Error".mysqli_error($conn);
    }

    $orderCheckResult = mysqli_query($conn,$orderCheck);
    $orderCheckValue = mysqli_fetch_assoc($orderCheckResult);

    while($value=mysqli_fetch_assoc($checkResult)){
        $orderDetails = "INSERT INTO `orderdetails`(`order_id`, `product_id`, `product_price`, `order_quantity`, `orderdetails_total`, `created_at`, `updated_at`) VALUES ('".$orderCheckValue['order_id']."','".$value['product_id']."','".$value['unit_price']."','".$value['quantity']."','".number_format($value['quantity'] * $value['unit_price'], 2)."','$datime','$datime')";

        if(mysqli_query($conn,$orderDetails)){
            echo $orderDetails;
        }else{
            echo "Error".mysqli_error($conn);
        }
    }

    $delete="DELETE FROM `cart` WHERE `customer_id`='".$_SESSION['USERID']."'";
    if(mysqli_query($conn,$delete)){
        echo '<script>alert("Products Succesfully purchased")</script>';
        echo '<script>window.location="Logged In Home page.php"</script>';
    }
}else{
    echo '<script>alert("No products to be purchased.")</script>';
    echo '<script>window.location="Cart Page.php"</script>';
}
?>