<?php
/** common.php
 *  Created By Paul King
 *  2013
 */

// checks that all field in the form contain valid information or any information where required
function checkForm()
{
	$errors = 0; // counts the number of errors in the form
	$errorString = '';
	$emailExpression = "/^[a-zA-Z0-9_\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/"; // regular expression that the email address much match
	//hideErrorMassages();
	
	$email = strtolower($_POST['email_address']); // convert all leters in the email address to lowercase
	
	// check that a valid email address has been entered
	if(!preg_match($emailExpression, $_POST['email_address']))
	{
		$errorString = $errorString."The email address entered appears to be invalid<br>";
	}
	if(usernameExists($_POST['email_address']))
	{
		$errorString = $errorString."An account with the selected email address already exists.<br>";
	}	
	if(strlen($_POST['password']) < 8)
	{
		$errorString = $errorString."The password is too short.<br>";
	}
	if($_POST['password'] != $_POST['confirm_password']) // if the 2 password field do not match
	{
		$errorString = $errorString."The passwords entered do not match.<br>";
	}
	if(empty($_POST['first_name']))
	{	
		$errorString = $errorString."First name field is empty.<br>" ;
	}

	if(empty($_POST['last_name']))
	{
		$errorString = $errorString."Last name field is empty.<br>";
	}

	if(empty($_POST['year_born']) || !ctype_digit($_POST['year_born']))
	{
		$errorString = $errorString."The date of birth is empty or invalid.<br>";
	}

	if(empty($_POST['street_address'])) // if the street address field is empty
	{
		$errorString = $errorString."Street Address field is empty.<br>";
	}
	if(empty($_POST['suburb'])) // if the suburb field is empty
	{
		$errorString = $errorString."Suburb field is empty.<br>";
	}
	// if the postcode is not four characters long or the string is not numeric
	if((strlen($_POST['postcode']) !=4) || (!ctype_digit($_POST['postcode'])))
	{
		$errorString = $errorString."The postcode is empty or invalid.<br>";
	}
	// if their is a phone number number typed in and it is not 8 digits long or it is not a number or the
	if(!empty($_POST['home_phone']))
	{			
		if(!ctype_digit($_POST['home_phone']) || strlen($_POST['home_phone']) !=8 )
		{
			$errorString = $errorString."The home phone number is invalid.";
		}
	}
	if(!empty($_POST['work_phone']))
	{
		
		if(!ctype_digit($_POST['work_phone']) || strlen($_POST['work_phone']) != 8)
		{
			$errorString = $errorString."The work number entered is invalid.<br>";
		}
	}
	// if the phone number is not a number or the number that is typed in is not 10 digits long
	if(!empty($_POST['mobile_phone']))
	{
		if(!ctype_digit($_POST['mobile_phone']) || strlen($_POST['mobile_phone']) != 10)		
		{
			$errorString = $errorString."The mobile phone number entered is invalid.<br>";
		}
	}
	if(!empty($_POST['fax_number'])) // if a fax number is entered but it is not valid
	{
		if(!ctype_digit($_POST['fax_number']) || strlen($_POST['fax_number']) !=8)
		{
			$errorString = $errorString."The fax number entered is invalid<br>";
		}
	}
	
	return $errorString;

} // end of checkForm function

function usernameExists($username) // function that checks if a user with the selected email address already exists
{	
	$xmlData = simplexml_load_file('../xml/members.xml');
	
	foreach($xmlData as $user) // loop through every main tag in the file
	{
		// check the the username matches one usernames in the xml file
    	if($user->attributes()->username == $username)		
			return true;
   		 // end if				
	} // end of foreach loop
	return false;
} // end of function

function checkCreditCard($errorString)
{
	// if no credit card company has been selected
	if(!isset($_POST['card_company']))// != 'visa') && ($_POST['card_company'] != 'mastercard'))
		$errorString = $errorString.'You have not selected a credit card company<br>';
	// if no name for the cardholder has been entered
	if(empty($_POST['cardholder_name']))
		$errorString = $errorString.'The cardholder name has not been entered<br>';
	// if the credit card number is not a 16 digit number
	if(strlen($_POST['card_number'])!= 16 || !ctype_digit($_POST['card_number']))
		$errorString = $errorString.'The credit card number is invalid<br>';
	// if the value in the exprey year is not a 2 digit number greater then 12
	if(strlen($_POST['expiry_year']) != 2 || !ctype_digit($_POST['expiry_year']) || (int) $_POST['expiry_year'] < 13)
		$errorString = $errorString.'The expiry date is invalid<br>';
	// if the verification code does not contain a 3 digit number
	if(strlen($_POST['verification_code']) != 3 || !ctype_digit($_POST['verification_code']))
		$errorString = $errorString.'The verification code is invalid<br>';
		
	return $errorString; // return all the errors found
}

function displayFormContent()
{
	print "<p>Here is the information you have entered.</p>";
	foreach ($_POST as $key=> $value)
	{
		echo "$key: $value <br>";
	}
}

function addRegistraion() // updates xml file by sending adding a new registraion to it
{
	$xmlDoc = new DOMDocument(); // create a new XMl Dom Document
	$xmlDoc->Load('../xml/members.xml'); // opens the xml file for editing
	$xmlDoc->formatOutput = true; // formats the output when displayed or wrtiiten to file
	$xmlDoc->preserveWhiteSpace = false; // removes all whitespaces
	 
	$members = $xmlDoc->createElement("members");
	
	// locate the first instance of the members tag and add the element to variable
	$members = $xmlDoc->getElementsByTagName("members")->item(0);
	 
	$xmlDoc->appendChild($members); // append the members tag to the document 
	  
	$member = $xmlDoc->createElement("member"); // create element for one user
	
	$member->setAttribute("username", strtolower($_POST['email_address']));
	
	$email = $xmlDoc->createElement("email", strtolower($_POST['email_address']));
	$member->appendChild($email);	
	
	//create the password and add to login tag
	$password = $xmlDoc->createElement("password", md5($_POST['password']));  
	$member->appendChild($password);	
	
	// add the login tag to members
	//$member->appendChild($login); 
	 
	 // add first name tag and value
	$firstName = $xmlDoc->createElement("firstname", $_POST['first_name']);  	  
	$member->appendChild($firstName);   
	 // add lastname tag and value
	$lastName = $xmlDoc->createElement("lastname", $_POST['last_name']); 
	$member->appendChild($lastName);   
	 // add gender tag and value
	if(isset($_POST['gender']))
	{
		$gender = $xmlDoc->createElement("gender", $_POST['gender']); 
		$member->appendChild($gender); 
	}
	// add the date of birth tag and value
	$dob = $xmlDoc->createElement("DateOfBirth", $_POST['day_born'].'/'.$_POST['month_born'].'/'.$_POST['year_born']);
	$member->appendChild($dob);
	// add the stree address tag and value
	$address = $xmlDoc->createElement("StreetAddress", $_POST['street_address']);
	$member->appendChild($address);
	// add the town/suburb tag and value
	$suburb = $xmlDoc->createElement("Town-Suburb", $_POST['suburb']);
	$member->appendChild($suburb);
	// add the postcode tag and value
	$postcode = $xmlDoc->createElement("postcode", $_POST['postcode']);
	$member->appendChild($postcode);
	
	// add the telphone details
	$telephone = $xmlDoc->createElement("PhoneNumbers");  
	$homePhone = $xmlDoc->createElement("home", $_POST['home_phone']);
	$telephone->appendChild($homePhone);	
	$mobile = $xmlDoc->createElement("mobile", $_POST['mobile_phone']);
	$telephone->appendChild($mobile);	
	$workPhone = $xmlDoc->createElement("workPhone", $_POST['work_phone']);
	$telephone->appendChild($workPhone);	
	$faxNumber = $xmlDoc->createElement("fax", $_POST['fax_number']);
	$telephone->appendChild($faxNumber);	
	/*$otherNumber = $xmlDoc->createElement("other", $_POST['']);
	$telephone->appendChild($otherNumber);*/
		
	$member->appendChild($telephone);
	 
	// add membership type information
	$membership = $xmlDoc->createElement("membership");
	$level = $xmlDoc->createElement("level", $_POST['membership_type']);
	$membership->appendChild($level);
	$duration = $xmlDoc->createElement("duration", $_POST['membership_duration']);
	$membership->appendChild($duration);
	  
	$member->appendChild($membership);
	
	// add the bookings tag for individual bookings
	$bookings = $xmlDoc->createElement("bookings");
	$member->appendChild($bookings);
	 
	// add all the member information to the members tag
	$members->appendChild($member);
	 
	//$xmlDoc->saveXML();
	$xmlDoc->save('../xml/members.xml'); // save the xml stucture to file
	
} // end of addNewRegistraion function

function checkLoginStatus()
{
	//session_start(); // begins a session
	
	if(isset($_SESSION['username'])) // check if the username variable is set for the session 
	{			
		print 'Welecome <strong>'.htmlentities($_SESSION['firstname']).'!</strong><br />'
			.'Your are logged in.<br>';			
		?>
			<a href="script/logout.php">logout</a>
		<?php
	}
	else
	{	
		?>		
		You are not currently logged in.<br />
		<a href="login.php">login</a>/<a href="register.php">register</a>
		<?php
	}  // end of isset
} // end of function

function updateActivityPlaces($activityID, $action, $folder_root)
{
	$activities = simplexml_load_file($folder_root.'xml/activities.xml'); //open xml file

	foreach($activities as $activity)
	{
		if((string)$activity->attributes()->id == $activityID)
		{
			switch($action)
			{
				case 'add':
					$placesLeft = (int) $activity->placesLeft;
					$placesLeft +=1;
					$activity->placesLeft = $placesLeft;
					//echo 'successful add<br>';
				break;
				case 'remove':
					$activity->placesLeft -= 1;
					//echo 'successful remove<br>';
				break;
				default: echo 'Error: argument 2 $action in updateActivityPlaces function is invalid.<br>';
			} // end of switch statement
			
		} // end of if
	}
	// end of activities xml code
	
	$activities->asXML($folder_root.'xml/activities.xml'); // resave file
	
} // end of function
?>

<script type="text/javascript">
	function previousPage()
	{
		// return user to the previous page they were on
		window.history.back();
	}
</script>