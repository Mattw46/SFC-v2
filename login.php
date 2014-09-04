<?php
	require_once('library.php');
	
	$error = '0';

	if (isset($_POST['submitBtn'])){
		// Get user input
		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
        
		// Try to login the user
		$error = loginUser($username,$password);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<title>SFC - Synergy Fitness Club</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
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
					<li><a href="register.php">Register</a> </li>
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
               <?php if ($error != '') {?>
      			<div class="caption">Site login</div>
      			<div id="icon">&nbsp;</div>
      			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
        			<table width="100%">
          				<tr><td>Username:</td><td> <input class="text" name="username" type="text"  /></td></tr>
          				<tr><td>Password:</td><td> <input class="text" name="password" type="password" /></td></tr>
          				<tr><td colspan="2" align="center"><input class="text" type="submit" name="submitBtn" value="Login" /></td></tr>
        			</table>  
      			</form>
      
      			&nbsp;<a href="register.php">Register</a>
      
				<?php 
				}   
    				if (isset($_POST['submitBtn'])){

				?>
      					<div class="caption">Login result:</div>
      					<div id="icon2">&nbsp;</div>
      					<div id="result">
       						 
				<?php
					if ($error == '') {
						echo "Welcome $username! <br/>You are logged in!<br/><br/>";
						echo '<a href="index.php">Now you can visit the index page!</a>';
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
					<span class="link">Site map</span> | 
					<span class="link"><a href="privacy.php">Privacy</a></span>
				</span>
			</div>
		</div>
	</body>
</html>
