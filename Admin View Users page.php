<?php
//for include("") method it trys to read if it does not find the page then it just shows an error and continues execution
//require: it reads the page always if it doeasnt find the page it stops execution
require("DBConnection.php");
	
	$sql="SELECT `User_ID`, `Email`, `User_FName`, `User_LName`, `Gender`, `Password`, `role` FROM `users`";
	$result=mysqli_query($conn,$sql);
?>

	<html>
	<head>
		<title>Admin View Users Page</title>
		<link rel="stylesheet" href="E-COMMERCE CSS.css">
		<link rel = "icon" href ="Images/Icon.jpg" type ="image/x-icon">
	</head>

	<body class="allpages" id="AdminViewUsersPage">

		<header id="headerAdmin">
			<img src="Images/logo.jpg" id="Logo" alt="Our Logo">

			<div id="socialmedia">			
				<a href="https://www.instagram.com/" id="Instagram" target=_blank><img src="Images/insta.png" class="socialmedia" id="instasmall"></a>
				<a href="https://www.facebook.com/" id="Facebook" target=_blank><img src="Images/facebook.png" class="socialmedia"></a>
				<a href="https://www.whatsapp.com/" id="Whatsapp" target=_blank><img src="Images/whatsapp.png" class="socialmedia"></a>
				<a href="https://twitter.com/" id="Twitter" target=_blank><img src="Images/twitter.png" class="socialmedia"></a>
			</div>

			<div id="searchbar">
				<img src="Images/Search.png" id="searchicon">
				<input type="text" id="searchedcloth" name="clothsearch" placeholder="Search for">
		    </div>

			<img src="Images/easy-returns.gif" id="return" alt="return policy image">

			<div id="top_right">
				<a id="usernameAdmin" class="topRight"><?php session_start(); echo $_SESSION['USERNAME'];?></a>
				<a href="Home page.php" id="LogoutpageAdmin" class="topRight">Log Out</a>       
			</div>

			<div id="navigationbar">
				<a href="Admin page.php" id="Addpage" class="navbar">Add</a>
				<a href="Admin View Products page.php" id="AdminViewProducts" class="navbar">View Products</a> 
				<a href="Admin View Users page.php" id="AdminViewUsers" class="navbar">View Users</a> 
				<a href="Admin View Orders page.php" id="AdminViewOrders" class="navbar">View Orders</a> 
			</div>
		</header>

		<table id="userData">
			<thead>
				<th>User ID</th>
				<th>Email</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Gender</th>
				<th>Password</th>
				<th>Role</th>
				<th colspan="2">Action</th>
			</thead>
			<tbody>
				<?php
					/*mysqli_fetch_assoc($result) it fetches the first(only one) row data in defined variable, not all rows data together*/
					while ($value=mysqli_fetch_assoc($result)) {	
				?>
				<tr>
					<td class="userId"><?php echo $value["User_ID"]; ?></td>
					<td><?php echo $value["Email"]; ?></td>
					<td><?php echo $value["User_FName"]; ?></td>
					<td><?php echo $value["User_LName"]; ?></td>
					<td><?php echo $value["Gender"]; ?></td>
					<td><?php echo $value["Password"]; ?></td>
					<td><?php echo $value["role"]; ?></td>
					<form action="Admin Remove processing.php?action=user&user=<?php echo $value["User_ID"]; ?>" method="post">
					<td><button>Remove</button></td>
					</form>
					<form action="Admin Edit processing.php?action=editUser&user=<?php echo $value["User_ID"]; ?>" method="post">
					<td><button>Edit</button></td>
					</form>
				</tr>
				<?php
					}
				?>
				
			</tbody>
		</table>

	</body>
	</html>