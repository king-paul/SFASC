<?php
ob_start();
$loggedIn = false;  // declare an eeor varaiable and set it's value to false

if(isset($_POST['submitBtn'])) // if the login button is clicked
{ 
	// read the value in the username field replacing invalid characters
	$username = strtolower($_POST['username']);//preg_replace('/[^A-Za-z]/', '', $_POST['username']);
	// read the password field and hash the value with md5 hash	
	$password = md5($_POST['password']);
	
	$xmlData = simplexml_load_file('xml/members.xml');
	
	foreach($xmlData as $member) // loop through every main tag in the file
	{
		// check the the username matches one of the attributes in the xml file
    	if($member->attributes()->username == $username)
		{
			//echo 'username found';
			if($password == $member->password)
			{
				session_start(); // begin a new session
				$firstname = $member->firstname; // get the first ame from xml file				
				// set the first name session variable for the first name
				$_SESSION['firstname'] = (string) $firstname;
				// set the username session variable to the vale of username
				$_SESSION['username'] = strtolower($_POST['username']);				
				$loggedIn = true; // set the logged in value to true
				//die; // terminate the current script
							
			}
			//echo 'password invalid';
   		} // end if	
			
	} // end of foreach loop
	//echo 'the username was not found';
	
} // end if isset

function addElementsToArray($member)
{
	$_SESSION['userDetails'] = array(
		'firstName'=>$xml->$member->firstname, 
		'lastName'=>$xml->$member->lastname, 
		'gender'=>$xml->$member->gender, 
		'dateOfBirth'=>$xml->$member->DateOfBirth, 
		'streetAddress'=>$xml->$member->StreetAddress, 
		'gender'=>$xml->$member->suburb, 
		'address'=>$xml->$member->postcode, 
		'homePhone'=>$xml->$member->PhoneNumbers->home,
		'mobilePhone'=>$xml->$member->PhoneNumbers->mobile,
		'workPhone'=>$xml->$member->PhoneNumbers->work,
		'faxNumber'=>$xml->$member->$xml->$member->PhoneNumbers->fax,
		'membershipType'=>$xml->$member->membership->level,
		'membershipDuration'=>$xml->$member->membership->duration,
		'bookings'=>array()
	);
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>SFASC - Sweat Hut Fitness and Sporting Club</title>
<link rel="stylesheet" type="text/css" href="styles/site.css" />
<link rel="stylesheet" type="text/css" href="styles/form.css" />

</head>

<body>

<div id="wrapper">

  <div id="header">
  
	<div id="logo">
	   	<img src="images/logo.gif" alt="SFASC logo" />
	</div> 
	<div id="banner">
	    <h3>Sweat Hut Fitness and Sporting Club</h3>
	    <h4>Convenient, affordable, and fun sport and fitness</h4>
	</div>    
	  
	<div id="navbar">
		<div class="link"><a href="index.php"><span>Home</span></a></div>
		<div class="link"><a href="services.php"><span>Services</span></a></div>
		<div class="link"><a href="contact.php"><span>Contact Us</span></a></div>
		<div class="link"><a href="timetable.php"><span>Timetable</span></a></div>
		<div class="link"><a href="memberinfo.php"><span>Member's Area</span></a></div>
	</div>
	  
  </div><!-- end of header -->
  
  <div id="main">
  
	<div id="main_content_left"><!-- left side of the screen -->
		    <div id="form_area">
<?php 
	if ($loggedIn == false) // if the user has not logged in
	{
?> <!--display the login form-->
      <h1 align="center">Site login</h1>
      <div id="icon">&nbsp;</div>
      <form action="" method="post" name="loginform">
        <table width="100%">
          <tr><td>Email Address:</td><td> <input class="text" name="username" type="text"  /></td></tr>
          <tr><td>Password:</td><td> <input class="text" name="password" type="password" /></td></tr>
          <tr><td colspan="2" align="center"><input class="text" type="submit" name="submitBtn" value="Login" /></td></tr>
        </table>  
      </form>
      
      &nbsp;<strong>Not yet registered?</strong><a href="register.php">Register Now</a>
      
<?php 
	} 
		  
    if (isset($_POST['submitBtn']))
	{
?>
      <h1 align="center">Login result:</h1>
      <div id="icon2">&nbsp;</div>
      <div id="result">
        <table width="100%"><tr><td><br/>
<?php
	  if ($loggedIn == true)
	  {
		  //header('location:../index.php');
		  echo "Welcome ".$firstname."! <br/>You are logged in!<br/><br/>";
		  echo '<a href="index.php">Now you can visit the index page!</a>';
	  }
	  else // if the user is still not logged in
		  echo 'Invalid username or password.';
	  // end of of/else

?>
		<br/><br/><br/></td></tr></table>
	</div>
<?php            
  } // end of isset for submit button
?>
		<div id="source">SFASC Login System</div>
	</div>			
	</div>
		
		<div id="main_content_right">
			<img src="images/inside-gym.jpg" width="277" height ="182" alt="Inside the gym"/>
			<br />
			<img src="images/x-trainer.jpg" width="280" height ="210" alt="People on cross trainer"/>
			<br />
			<img src="images/body-pump.jpg" width="280" height="173" alt="Body pump group" />		
		</div> 		
	      
  </div><!-- End of main content -->
  
  
  <div id="footer">
	  <div id="footer_left"><h4>&copy; 2013 Paul King</h4></div>
	   <div id="footer_right">
	   <a href="sitemap.php">Site Map</a> &nbsp;&nbsp;
	   <a href="privacy.php">Privacy</a>
	 </div>
  </div><!-- End of footer -->
  
</div> <!-- end of Wrapper-->

</body>
</html>