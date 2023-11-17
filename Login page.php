 <html>
	<head>
		<title>Login Page</title>
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
				<a href="Sign Up page.php" id="Signuppage" class="topRight">Sign Up</a>       
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
				<form action="User Login processing.php" method="post">
					<label for="UserLoginEmail">E-mail</label>
					<input type="Email" id="UserLoginEmail" name="userLoginEmail_input" required placeholder="Enter Email"><br><br>					
			
					<label for="userLoginPassword">Password</label>
					<input type="Password" id="userLoginPassword" name="userLoginPass_input" required placeholder="Enter Password"><br><br>
					
					<button type="submit" id="LoginButton" value="for sign up its register" name="reg_btn">Login</button>
				</form>
			</fieldset>

	</body>
</html>
