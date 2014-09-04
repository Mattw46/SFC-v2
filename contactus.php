<?php
	require_once('library.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<title>SFC - Synergy Fitness Club</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
                <script>
                    function geoFindMe() {
                        var output = document.getElementById("out");

                        if (!navigator.geolocation){
                            output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
                            return;
                        }

                        function success(position) {
                            var latitude  = position.coords.latitude;
                            var longitude = position.coords.longitude;

                            output.innerHTML = '<p>Latitude is ' + latitude + '° <br>Longitude is ' + longitude + '°</p>';

                            var img = new Image();
                            img.src = "http://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=13&size=300x300&sensor=false";

                            output.appendChild(img); 
                        };

                        function error() {
                            output.innerHTML = "Unable to retrieve your location";
                        };

                        output.innerHTML = "<p>Locating…</p>";

                        navigator.geolocation.getCurrentPosition(success, error);
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
					<li class="selected"><a href="#">Contact Us</a> </li>
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
				<h2>Synergy Fitness Club: How to contact us:</h2>
				<p> You can contact us via a variety of methods:</p>
				<h4>Postal Address:</h4>
				<p class="contact-content"> 6 Fitness Circuit <br /> Sydney,  NSW<br /> 2000</p>
				<h4>Phone:</h4>
				<p class="contact-content">02 1234-5678</p>
				
				<h4>Contact Form:</h4>
				<p class="contact-content">Please enter your enquiry and we will contact you</p>
				<form onsubmit="" method="post" action="mailto:admin@sfc.com.au">
					<div>
						<p class="contact-label">Email: </p>
						<input value="" id="email" type="text"/>
					</div>
					<div>
						<p class="contact-label">Message: </p>
						<textarea name="address" rows="3" cols="40"> </textarea> 
					</div>
					<p><input value="Submit" type="submit"/></p>
				</form>
                                <p><button onclick="geoFindMe()">Show the nearest location</button></p>
                                <div id="out"></div>
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
