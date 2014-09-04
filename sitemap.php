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
                                <h3>Site Map</h3>
				<?php
                                    $output = file("data/data.txt");
                                    $length = count($output);
                                    $x = 0;
                                    while ($x < $length) {
                                        $currentRow = explode(":",$output[$x]);
                                        echo "<p><a href=\"http://localhost/".$currentRow[1]."\">".$currentRow[0]."</a></p>";
                                        $x++;
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
