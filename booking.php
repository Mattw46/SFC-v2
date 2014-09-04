<?php
	require_once('library.php');
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<title>SFC - Synergy Fitness Club</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link href="scripts/jquery-ui-1.11.1.custom/jquery-ui.css" rel="stylesheet">
		 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
		<!--<link rel="stylesheet" href="/resources/demos/style.css">-->
		<script>
			$(function() {
				$( "#datepicker" ).datepicker({ dateFormat: "dd-mm-yy" });
			});
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
					<li><a href="register.php">Register</a> </li>
                    <li><a href="events.php">Events</a></li>
                    <li class="selected"><a href="booking.php">Booking</a></li>
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
      			<h4>Booking Page</h4>
      			<br />
      			<?php
      				// check for a submitted booking and attempt to register
      				if (isset($_POST['submitBooking'])) {
      					//echo "You submitted<br>".$_POST['class'];
      					$elements = explode(";",$_POST['class']);
      					if ($elements[4] > 20) {
      						echo '<p style="color: red;">The Class is Full<p>';
      					}
      					else {
      						decrementCount($_POST['class']);
      						$string = $_SESSION['userName'].":".$elements[3].":".$elements[1]."\n";
      						$handle = fopen("data/activity.txt","a+");
      						$result = fwrite($handle, $string);
        					fclose($handle);
        					if ($result == false) {echo "failed<br>";}
        					echo '<p style="padding-left: 20px;">You are Registered</p>';
      					}
      				}
      			?>
      			 <h4>My Actvities</h4>
      			<?php
      				// Check for a logged in user and print activities
      				if (!isset($_SESSION['validUser'])) {
      					echo '<p>You must be logged in to make bookings</p>';
      					echo '<p><a href="login.php">Login</a></p>';	
      				}
      				else {
      					// Attempt to read bookings from file and print where matches id
      					$hasSchedule = readActivities();
      					if ($hasSchedule == false) {
      						echo "<p>You currently do not have any classes scheduled";
      					}
      				}
      			?>
      			
      			<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="checkSched">
      				
      				<?php
      					// check for a valid user and display date picker
      					if (isset($_SESSION['validUser'])) {
      						echo '<p>Choose a Date to see schedule</p>';
      						echo '<p>Date: <input type="text" id="datepicker" name="date"></p>';
      						echo '<input class="text" type="submit" name="submitBtn" value="check Schedule" />';
      					}
      				?>
      			</form>
      			<br>
      			<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="booking">
      				<?php
      					// check for logged in user and submitted date, prints activities for that date
      					if (isset($_SESSION['validUser']) && isset($_POST["date"]) && $_POST["date"] != "") {
      						$date = $_POST["date"];
      						echo '<h4>Classes for '.$date.'</h4>';
      						echo '<div style="padding-left: 25px;">';
      						// Read file, check each line for matching day/date
      						$result = printSchedule($date);
      						echo "</div>";
      						if ($result == true) {
      							echo '<input class="text" type="submit" name="submitBooking" value="book" />';
      						}
      						else {
      							echo "No classes found for ".$date;
      						}
      					}
      					
      				?>
      				
      			</form>
      			<div id="extraSpace"></div>
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
