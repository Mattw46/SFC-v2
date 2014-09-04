<?php
	require_once('library.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>SFC - Synergy Fitness Club</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
                <style>
                    #canvas {border:1px solid #000};
                </style>
                <script>
                    var loaded = 0, numOfImages = 4;

                    var image0 = document.createElement('img'); 
                    var image1 = document.createElement('img'); 
                    var image2 = document.createElement('img');
                    var image3 = document.createElement('img');

                    image0.onload = image1.onload = 
                    image2.onload = image3.onload = function(e) {
                    loaded++;
                    if (loaded === numOfImages)
                        draw();   
                    }

                    image0.onerror = image1.onerror = 
                    image2.onerror = image3.onerror = function(e) {
                           alert(e.toString());
                    }

                    image0.src = "images/join_today.png";
                    image1.src = "images/boxing_class.jpg";
                    image2.src = "images/Personal_Trainer.jpg";
                    image3.src = "images/pump_class.jpg";

                    function draw() {

                        var images = new Array(image0, image1, image2, image3),
                        counter = 0,
                        maxNum = images.length - 1,

                        myCanvas = document.getElementById('myCanvas'),
                        ctx = myCanvas.getContext('2d'),

                        me = this; 

                        this._draw = function() {

                        ctx.clearRect(0, 0, myCanvas.width, myCanvas.height)
                        ctx.drawImage(images[counter++], 0, 0);
                        if (counter > maxNum) counter = 0;
                            setTimeout(me._draw, 3000); 
                        }
                        this._draw(); 
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
					<li><a href="index.php">Home</a></li>
					<li><a href="services.php">Services</a>  </li>
					<li><a href="contactus.php">Contact Us</a> </li>
					<li><a href="register.php">Register</a> </li>
                    <li class="selected"><a href="#">Events</a></li>
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
                            <h3>Events</h3>
				<canvas id="myCanvas" width="816" height="300"></canvas>
                                <!-- http://jsfiddle.net/AbdiasSoftware/dhxNz/-->
				<br />
				<h4>Join Now Get One Month Free</h4>
				<p>For a limited time if you join you get one month complementary membership. Choose from Gold, Silver or bronze membership to get your free month. To take up this offer simply go our <a href="register.php">register</a> page to register as a new member.</p>
				<h4>Boxing Class Promo</h4>
				<p>We are currently offering a promotion for 20% off for 6 week boxing classes. It's a great way to try something new. If your already a member simply call in to your nearest location or enquire via our <a href="contactus.php">contact us</a> page.</p>
				<h4>Book a Personal Trainer and Get 1 Free Consultation</h4>
				<p>Do you need a personal trainer to get you back on track or simply need guidance or to customize your workout? this is a great time to book one of our personal trainers and 1 free consultation for your first meeting. then you just pay our great value rate for any follow up or long term training sessions.</p>
				<h4>Pump Classes Starting Soon</h4>
				<p>Are you a fan of our fun pump classes or ready to try something new? try out one of our upcoming pump class. For more information call into one of our convenient locations or request information via our <a href="contactus.php">contact us</a> page.</p>
                                <h3>Other Events</h3>
                                <p>All new boot camp coming soon</p>
                                <br />
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
