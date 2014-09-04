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
					<li class="selected"><a href="#">Home</a> </li>
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
				<h2>Synergy Fitness Club</h2>
				<p>Here at Synergy Fitness Club, we offer a range of <a href="services.php">services</a> that will suit just about anyone.</p>
				
				<h2>Open 24 hours</h2>
				<p>We are open 24 hours 7 days a week, this allows you to fit your workout in with your busy lifestyle.
				   drop into a branch at any time of day for your convenience.</p>
				   
				<h2>Affordable membership</h2>
				<p>We offer memberships at a variety of price points, come in and find a membership plan that works for you.</p>
				
				<h2>Full Range of services</h2>
				<p>Try out our range of services, we offer everything from weight training through to a variety of classes or if you
				   prefer book in one of our highly qualified personal trainers or dietitians for a private consultation</p>
				   
				<h2>Multiple locations</h2>
				<p>Your membership entitles you to visit any of our many conveniently located clubs and have full use of the facilities.</p>
				<br />
				<!-- image row-->
				<div id="image-row">
					<img id="image-left" src="images/Weight-Room.jpg" alt="Weight Room" />
					<!-- http://yk.psu.edu/Images/YK/vt_fitness_room_rdax_90.jpg-->
					<img src="images/Fitness_Center.jpg" alt="Fitness Center" />
					<!-- http://b2bimg.bridgat.com/files/Fitness_Center_1.jpg-->
				</div>
				<?php
					if (isset($_SESSION['validUser'])) {
						echo "logged in";
					}
					else {
						echo "logged out";
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
