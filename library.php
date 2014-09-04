<?php

	session_start();
	
	function formError() {
    	echo "<a href=\"javascript:history.back()\">Back</a>";
    }
                                    
    // Lunns algorithm - http://www.ascadnetworks.com/Guides-and-Tips/Credit-Card-Validation%252C-Step-2%253A-The-Luhn-Algorithm
    function cc_validate_checksum($cardNumber) {

        $cardNumber = preg_replace('/\D/', '', $cardNumber);
    
        // Determine the string length
        $cardLength = strlen($cardNumber);
    
        // Determine the string's remainder
        $cardCheck = $cardLength % 2;
    
        // Break up the card number into individual
        // digits and combine total.
        $combineTotal = 0;
        $cur = 0;
        $breakCard = str_split($cardNumber);
        foreach ($breakCard as $digit) {
    
            // Multiply alternate digits by two
            if ($cur % 2 == $cardCheck) {
            	// If the multiplied digits is greater
                // than 9, subtract 9.
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
    
            // Total up the digits
            $combineTotal += $digit;
            $cur++;
        
    	}
    
    	return ($combineTotal % 10 == 0) ? true : false;

    }
    
    // Register a new user and add to text file if credit card validates
    function registerUser($uName,$pass,$_POST) {
    	$first = $_POST['first'];
        $last = $_POST['last'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $address = $_POST['address']; 
        $membership = $_POST['membership'];
        $ccn = $_POST['ccn'];
        $cce = $_POST['cce'];
        $duration = $_POST['duration'];
        
        // Validate credit card, return error if not valid
        if(cc_validate_checksum($ccn) == false) {
        	return "<p class=\"errorMessage\">Invalid Credit Card number check and try again</p>";
        }
        
        $text = $uName.":".$pass.":".$first.":".$last.":".$dob.":".$gender.":".$email.":".$address.":".
        	$membership.":".$ccn.":".$cce.":".$duration."\n";
        $file = "data/registeredUsers.txt";
        $handle = fopen($file,"a+");
        if (!$handle) {
        	return "<p> Internal Error </p>";
        }
        while (($line = fgets($handle)) !== false) {
        	$current = explode(":",$line);
        	if ($current[0] == $uName) {
        		return "<p class=\"errorMessage\">Username already taken</p>";
        	}
        }
        fwrite($handle, $text);
        fclose($handle);
        return;
    }
	
	// Logs in a user
	function loginUser($user,$pass) {
		$errorText = '';
		$validUser = false;
	
		// Check user existance	
		$pfile = fopen("data/registeredUsers.txt","r");
    	rewind($pfile);

    	while (!feof($pfile)) {
        	$line = fgets($pfile);
        	$tmp = explode(':', $line);
        	if ($tmp[0] == $user) {
            	// User exists, check password
            	if (trim($tmp[1]) == trim($pass)){
            		$validUser= true;
            		$_SESSION['userName'] = $user;
            	}
            	break;
        	}
    	}
    	fclose($pfile);

    	if ($validUser != true) 
    		$errorText = "Invalid username or password!";
    
    	if ($validUser == true) {
    		$_SESSION['validUser'] = true;
    	}
    	else {
    		$_SESSION['validUser'] = false;
		}
		return $errorText;	
	}
	
	// Logout function
	function logoutUser(){
		unset($_SESSION['validUser']);
		unset($_SESSION['userName']);
	}
	
	//reads the activity file and prints to page
	function readActivities() {
		$scheduleFound = false;
		$file = "data/activity.txt";
		$handle = fopen($file,"a+");
		if (!$handle) {
        	return "<p> Internal Error </p>";
        }
        while (($line = fgets($handle)) !== false) {
        	$current = explode(":",$line);
        	if ($current[0] == $_SESSION['userName']) {
        		// print to screen
        		echo '<div style="padding-left: 25px;">';
        		echo "Class with: ".$current[1]." at: ".$current[2]."<br>";
        		echo "</div>";
        		$scheduleFound = true;
        	}
        }
        fclose($handle);
        return $scheduleFound;
	}
	
	// Prints a list of class on day $date
	function printSchedule($date) {
		$scheduleFound = false;
		$file = "data/schedule.txt";
		$handle = fopen($file,"a+");
		if (!$handle) {
        	return "<p> Internal Error </p>";
        }
        while (($line = fgets($handle)) !== false) {
        	$current = explode(";",$line); 
        	if ($current[0] == $date) {
        		echo '<input type="radio" name="class" value="'.$line.'">'.$current[0].": ".$current[2].
        			' with '.$current[3].' at '.$current[1].' '.$current[4].'slots left <br>'; 
        		// print to screen
        		$scheduleFound = true;
        	}
        }
        fclose($handle);
        return $scheduleFound;
	}
	
	// reads file for matching class and rewrites files with updated count (decremented)
	function decrementCount($string) {
		$file = file_get_contents('data/schedule.txt');
		$lines = explode(";",$file);
		$noLines = count($lines);
		$counter = 0;
		//$strExplode = explode($string);
		
		while ($counter < $noLines) {
			echo $lines[$counter]." - ".$string."<br />";
			if ($lines[$counter] == $string) {
				echo "#### Found ####\n";
			}
			//$counter = $counter - 1;
		}
	
		/*$input = "";
		$file = "data/schedule.txt";
		$handle = fopen($file,"a+");
		if (!$handle) {
        	return "<p> Internal Error </p>";
        }
        //echo 'String passed: '.$string;
        $strexplode = explode(';',$string);
        
        while (($line = fgets($handle)) !== false) {
        	$lineExplode = explode(';',$line);
        	
        	//echo 'Line: '.$line;
        	//echo 'Compare: date: '.$strexplode[0].' $line: '.$lineExplode[0].'<br />';
        	
        	if ($strexplode[0] == $lineExplode[0] && $strexplode[1] == $lineExplode[1]) {
        		
        		echo '******** <br />';
        		echo 'string:'.$string.' line: '.$line.'<br />';
        		echo '******** <br />';
        		$lineExplode[4] = $lineExplode[4] - 1;
        		$currentLine = $lineExplode[0].";".$lineExplode[1].";".$lineExplode[2].
        			";".$lineExplode[3].";".$lineExplode[4];
        		//$input .= $currentLine;
        	}
        	else {
        		//$input .= $line;
        	}
        }*/
        //$input .= $currentLine;
        fwrite($handle, $input);
        fclose($handle);
    }
?>