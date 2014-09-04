<?php
	require_once('library.php');
	
	if (isset($_POST['submitBtn'])){
		// Get user input
		$username  = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		
        
		// Try to register the user
		$error = registerUser($username,$password,$_POST);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<title>SFC - Synergy Fitness Club</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<script type="text/javascript">/* Assignment 2*/
			function checkForm() {
				first = document.getElementById("first").value;
				last = document.getElementById("last").value;
				email = document.getElementById("email").value;
				memType = document.getElementById("memberType").value;
				ccNo = document.getElementById("ccNo").value
				ccExpiry = document.getElementById("ccExpiry").value
				duration = document.getElementById("duration").value
				
				
				if (first == "") {
					hideAllErrors();
					document.getElementById("firstNameError").style.display = "inline";
					document.getElementById("first").select();
					document.getElementById("first").focus();
					return false;
				}
				if (last == "") {
					hideAllErrors();
					document.getElementById("lastNameError").style.display = "inline";
					document.getElementById("last").select();
					document.getElementById("last").focus();
					return false;
				}
				if (email == "" || checkEmail(email) == false) {
					hideAllErrors();
					document.getElementById("emailError").style.display = "inline";
					document.getElementById("email").select();
					document.getElementById("email").focus();
					return false;
				}
				if (memberType.value == "select") {
					hideAllErrors();
					document.getElementById("typeError").style.display = "inline";	
                                        return false;
				}
				if (ccNo == "") { 
					hideAllErrors();
					document.getElementById("ccnError").style.display = "inline";
					document.getElementById("ccNo").select();
					document.getElementById("ccNo").focus();
					return false;
				}
				if (ccExpiry == "") {
					hideAllErrors();
					document.getElementById("cceError").style.display = "inline";
					document.getElementById("ccExpiry").select();
					document.getElementById("ccExpiry").focus();
					return false;
				}
				if (duration == "select") {
					hideAllErrors();
					document.getElementById("durationError").style.display = "inline";
					return false;
				}
				return true;
			}
			function hideAllErrors() { 
				document.getElementById("firstNameError").style.display = "none";
				document.getElementById("lastNameError").style.display = "none";
				document.getElementById("emailError").style.display = "none";
				document.getElementById("typeError").style.display = "none";
				document.getElementById("ccnError").style.display = "none";
				document.getElementById("cceError").style.display = "none";
				document.getElementById("durationError").style.display = "none";
			}
			function checkEmail(inputvalue){	/* review*/
				var pattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
				return pattern.test(inputvalue);
			}
		</script>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<!-- Img sourced from http://www.clubcorp.com/var/ezflow_site/storage/images/media/clubs/oak-pointe-media-folder/images/facilities/fitness-room/
				     oak-pointe-country-club-brighton-mi-fitness-center-560x310/1130163-2-eng-US/
				     Oak-Pointe-Country-Club-Brighton-MI-fitness-center-560x310_singleImage.jpg-->
				<img src="images/logo.jpg" alt="log" />
				<p class="banner">The Fitness Club For Everyone</p>
			</div>
			<div id="nav">
				<ul>
					<li><a href="index.php">Home</a> </li>
					<li><a href="services.php">Services</a>  </li>
					<li><a href="contactus.php">Contact Us</a> </li>
					<li class="selected"><a href="#">Register</a> </li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="booking.php">Booking</a></li>
                    <?php
                    	if (isset($_SESSION['validUser'])) {
                    		echo '<li class="login"><a href="logout.php">Logout</a></li>';
                    	}
                    	else {
                    		echo '<li class="login"><a href="login.php">Login</a></li>';
                    	}
                    ?>
				</ul>
			</div>
			<div id="main">
				<h2>Registration Form</h2>
				<p class="text">To become a member simply fill out the form below and submit *</p>
				<p class="disclaimer">* A valid credit card is required for registration</p>
				<?php if ((!isset($_POST['submitBtn'])) || ($error != '')) {?>
					<form onsubmit="return checkForm();" method="post" action="register.php"><!-- -->
						<div>
							<p class="label">User Name</p>
							<input name="username" value="" id="user" type="text" />
						</div>
						<div>
							<p class="label">Password</p>
							<input type="password" name="password" value="" id="password" type="text" />
						</div>
						<div>
							<p class="label">First Name: </p><!-- Compulsory -->
							<input name="first" value="" id="first" type="text" />
						</div>
						<div class="error" id="firstNameError">Required: Please enter your first name<br /></div><p></p>
					
						<div>
							<p class="label">Second Name: </p><!-- Compulsory -->
							<input name="last" value="" id="last" type="text" />
						</div>
						<div class="error" id="lastNameError">Required: Please enter your last name<br /></div><p></p>
					
						<!-- DOB-->
						<div>
							<p class="label">Date of Birth:</p>
							<input name="dob" value="" id="dob" type="text" />
						</div>
						<!--<div class="error" id="DobError">Required: Please enter your Date of Birth<br /></div><p></p>-->
					
						<!-- Gender (Radio)-->
						<div>
							<p class="label">Gender:</p>
							<div class="gender">
								<input type="radio" name="gender" value="M"/><span class="gender-type">Male</span> <br />
							</div>
							<div class="gender">
								<input type="radio" name="gender" value="F"/><span class="gender-type">Female</span> 
							</div>
						</div>
						<!--<div class="error" id="genderError">Required: Please enter your gender<br /></div><p></p>-->

						<div>
							<p class="label">Email: </p><!-- Compulsory -->
							<input name="email" value="" id="email" type="text" />
						</div>
						<div class="error" id="emailError">Required: Please enter your email address<br /></div><p></p>

						<!-- Address textarea-->
						<div>
							<p class="label">Address:</p>
							<textarea name="address" rows="3" cols="40"> </textarea> 
						</div>
						<!--<div class="error" id="addressError">Required: Please enter your address<br /></div><p></p>-->
					
						<!-- Membership type (drop down)-->
						<div>
							<p class="label">Membership Type:</p><!-- Compulsory -->
							<select name="membership" id="memberType">
								<option value="select">Select</option>
								<option value="gold">Gold</option>
								<option value="silver">Silver</option>
								<option value="bronze">Bronze</option>
							</select>
						</div>
						<div class="error" id="typeError">Required: Please select a membership type<br /></div><p></p>
						
						<!-- Credit card No-->
						<div>
							<p class="label">Credit Card Number: (xxxx-xxxx-xxxx-xxxx)</p><!-- Compulsory -->
							<input name="ccn" class="ccn" value="" id="ccNo" type="text" />
						</div>
						<div class="error" id="ccnError">Required: Please enter your credit card number<br /></div><p></p>
					
						<!-- credit expiry (mm/yy)-->
						<div>
							<p class="label">Credit Card Expiry: (mm/yy)</p><!-- Compulsory -->
							<input name="cce" class="cce" value="" id="ccExpiry" type="text" />
						</div>
						<div class="error" id="cceError">Required: Please enter your credit card number<br /></div><p></p>
					
						<!-- Duration (Annual, 5 yrs, 10 years or lifetime)-->
						<div>
							<p class="label">Membership Duration:</p><!-- Compulsory -->
							<select name="duration" id="duration">
								<option value="select">Select</option>
								<option value="annual">Annual</option>
								<option value="5">5 Years</option>
								<option value="10">10 Years</option>
								<option value="lifetime">Lifetime</option>
							</select>
						</div>
						<div class="error" id="durationError">Required: Please select a membership duration<br /></div><p></p>
					
						<p><input name="submitBtn" value="Submit" type="submit" /></p>
					</form>
				<?php 
				}   
    				if (isset($_POST['submitBtn'])){

				?>
				      <div class="caption">Registration result:</div>
				      <div id="icon2">&nbsp;</div>
				      <div id="result">
			         <table width="100%"><tr><td><br/>
				<?php
					if ($error == '') {
						echo " User: $username was registered successfully!<br/><br/>";
						echo ' <a href="login.php">You can login here</a>';
		
					}
					else echo $error;

				?>
		
				<?php            
    			}
				?>
			</div>
			<div id="footer">
				<span class="year">2014 Matt</span>
				<span class="wrapper">
					<span class="link"><a href="sitemap.php">Site map</a></span> | 
					<span class="link"><a href="privacy.php">Privacy</a></span>
				</span>
			</div>
		</div>
	</body>
</html>

