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
					<li class="selected"><a href="#">Services</a>  </li>
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
				<h2>Services</h2>
				<p>Here at Synergy Fitness club we offer a wide variety of services for you to enjoy:</p>
				<br />
				<ul>
					<li class="service">Fully equiped weights room
						<ul class="sub-service">
							<li>This includes both free weights and weight machines</li>
						</ul>
					</li>
					<li class="service">Classes led by qualified instructors*
						<ul class="sub-service">
							<li class="lElement">Spin Classes</li>
							<li class="lElement">Body Combat Classes</li>
							<li  class="lElement">Zumba Classes</li>
							<li>Yoga Classes</li>
						</ul>
					</li>
					<li class="service">Heated pool
						<ul class="sub-service">
							<li>Includes an Olympic size pool and small spa pools</li>
						</ul>
					</li>
					<li class="service">Massage services to rehabilitate sore muscles and injuries</li>
					<li class="service">One-on-One Personal training - Get your own personalised workout</li>
					<li class="service">Healthy eating consultations with our dietitians</li>
					<li class="service">Regular Bootcamps *</li>
				</ul>
				<br />
				<p class="disclaimer"><strong>*</strong> Class times vary please check with your local branch for timetable</p>
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