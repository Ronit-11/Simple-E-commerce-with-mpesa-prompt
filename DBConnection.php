<?php
                     //or 127.0.0.1:3307
	$conn=mysqli_connect("localhost:3307","root","admin","ecommerce");
	if(!$conn){
		                      //. is for concatenation
		die("Connection failed: ". mysqli_connect_error());
	} // else{ echo "Connetion Succesfull";}
	
?>