<html>
	<head>
		<title>Sign Up Page</title>
		<link rel="stylesheet" href="E-COMMERCE CSS.css">
		<link rel = "icon" href ="Images/Icon.jpg" type ="image/x-icon">
	</head>

	<body class="allpages">
		<header id="header">
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
				<a href="Login page.php" id="SignUploginpage" class="topRight">login</a>       
				<a href="id or class of bottom page as written in css" id="Contactus" class="topRight">Contact Us</a>
			</div>

			<div id="navigationbar">
				<a href="Home page.php" id="Homepage" class="navbar">Home</a>
				<a href="Men Wear page.php" id="Menwearpage" class="navbar">Men Wear</a> 
				<a href="Women Wear page.php" id="Womenwearpage" class="navbar">Women wear</a>
				<a href="Child Wear page.php" id="Childwearpage" class="navbar">Child wear</a> 
			</div>

			<div>
				<img src="Images/brandLogo.png" id="brandlogos" alt="Our trusted clothing partners">
			</div>
		</header>

			<fieldset id="UserdataForm" class="form">
				<legend id="Legend">Enter Your Details</legend>
				<form action="User SignUp Processing.php" method="post">
					<label for="FirstName">First Name</label>
					<input type="text" id="FirstName" name="userFname_input" required placeholder="Enter First Name"><br><br>

					<label for="LastName">Last Name</label>
					<input type="text" id="LastName" name="userLname_input" required placeholder="Enter Last Name"><br><br>

					<label for="userGender">Gender</label>
					<span id="userGender">
						<input type="radio" id="userMale" required name="userGender_input" value="Male">
						<label for="userMale">Male</label>
						<input type="radio" id="userFemale" required name="userGender_input" value="Female">
						<label for="userFemale">Female</label>
					</span><br><br>
					
					<input type="hidden" id="UserRole" name="userRole_input" value="3">

					<label for="UserEmail">E-mail</label>
					<input type="Email" id="UserEmail" name="userEmail_input" required placeholder="Enter Email"><br><br>					
			
					<label for="userPassword">Password</label>
					<input type="Password" id="userPassword" name="userPass_input" required placeholder="Enter Password"><br><br>
					
					<button type="submit" id="SignUpButton" value="Register" name="reg_btn">Sign Up</button>
				</form>
			</fieldset>

	</body>
</html>
