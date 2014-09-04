<?php
	require_once('library.php');
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
                                <h3>Privacy Policy</h3>
                                <p><em>Purpose: </em>The purpose of the privacy policy is to set out our how your information
                                is stored, secured and access for the intended purpose. This information should be considered
                                prior to registering on this website or submitting the contact us form.</p>
                                <p><em>Definition:</em></p>
                                <ul>
                                    <li><em>User:</em> this is you the user of the website</li>
                                    <li><em>SFC:</em> Synergy Fitness Club</li>
                                    <li><em>Website:</em> Refers to the SFC website</li>
                                </ul>
                                <p><em>Privacy:</em> Any information provided to SFC will only be used for contacting members, 
                                    correspondence, and marketing purposes. By providing you information you agree to your
                                    information being used for the above purpose.</p>
                                <p><em>Security:</em> All reasonable efforts to protect your information will be employed to prevent
                                    unauthorised access. Access will only be given to authorised employees with genuine reason to 
                                    access the information.</p>
                                <p><em>Data Retention: </em>User information will only retained while a member of SFC. Once a user
                                    is no longer a member all information will be securely removed unless indicated otherwise by the
                                user.</p>
			</div>
			<div id="footer">
				<span class="year">2014 Matt</span>
				<span class="wrapper">
					<span class="link"><a href="sitemap.php">Site </a></span> | 
					<span class="link"><a href="#">Privacy</a></span>
				</span>
			</div>
		</div>
	</body>
</html>
