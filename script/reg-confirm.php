<?php
session_start();
require_once('common.php'); // includes functions from common.php file
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>SFASC - Sweat Hut Fitness and Sporting Club</title>

<link rel="stylesheet" type="text/css" href="../styles/site.css" />

</head>

<body>

<div id="wrapper">

  <div id="header">
  
	<div id="logo">
	   	<img src="../images/logo.gif" alt="SFASC logo" />
	</div> 
	<div id="banner">
	    <h3>Sweat Hut Fitness and Sporting Club</h3>
	    <h4>Convenient, affordable, and fun sport and fitness</h4>
	</div>    
	  
	<div id="navbar">
		<div class="link"><a href="../index.php"><span>Home</span></a></div>
		<div class="link"><a href="../services.php"><span>Services</span></a></div>
		<div class="link"><a href="../contact.php"><span>Contact Us</span></a></div>
		<div class="link"><a href="../timetable.php"><span>Timetable</span></a></div>
		<div class="link"><a href="../memberinfo.php"><span>Member's Area</span></a></div>
	</div>
	  
  </div><!-- end of header -->
  
  <div id="main">
   
		<div id="main_content_left">
    <?php
		$errorMessage = '';
		
		// check all values in registraion section of form and return errors
		$errorMessage = checkForm(); 
		// check all values in credit card section of form and return errors
		$errorMessage = checkCreditCard($errorMessage);
		
		if($errorMessage == '')
		{
		   addRegistraion(); // call function to add user to xml file
			
	       print '<h2>Registraion Complete</h2>';            	 
				 
		   print '<p>You have entered the following details</p>'.
				 '<h5>Login Details</h5>'.
				 'Email Address:'.$_POST['email_address'].'<br>'.
				 'Password: ********'.
				 '<h5>Member Details</h5>'.			   
				 '<p><b>First Name: </b>'.$_POST['first_name'].'<br>'.
				 '<b>Last Name: </b>'.$_POST['last_name'].'<br>'.
				 '<b>Gender: </b> ';
				 if(isset($_POST['gender'])){ echo $_POST['gender']; }
		   print '<br><b>Date Of Birth: </b>'.$_POST['day_born'].'/'.$_POST['month_born'].'/'.$_POST['year_born'].'<br><br>'.
				 '<b>Address: </b>'.$_POST['street_address'].', '.$_POST['suburb'].', '.$_POST['postcode'].'<br>'.
				 '<b>Phone Number</b><br>'.
				 '<b>Home: </b>'.$_POST['home_phone'].'<b>  Mobile: </b>'.$_POST['mobile_phone'].'<b>  Work: </b>'.$_POST['work_phone'].
				 '<b>  Fax: </b>'.$_POST['fax_number'].'<br><br>'.
				 '<h5>Membership info</h5>'.
				 '<b>Memberhsip Level: </b>'.$_POST['membership_type'].'<br>'.
				 '<b>Memberhsip Duration: </b>'.$_POST['membership_duration'].'<br><hr>';
				 
		   print '<h5>Credit Card Details</h5>'.
				 '<b>Card Company: </b>'.$_POST['card_company'].'<br>'.
				 '<b>Cardholder Name: </b>'.$_POST['cardholder_name'].'<br>'.
				 '<b>Credit Card No.: </b>'.$_POST['card_number'].'<br>'.
				 '<b>Expirey Date: </b>'.$_POST['expiry_month'].'/'.$_POST['expiry_year'].'<br>'.
				 '<b>Verification Code:</b> ***<br><br>';
				 
		   print '<p>Your registration was submitted sucessfully. Please check your email for confirmation along with your new login details'.
           		 '<br /><br />'.
            	 '<a href="../login.php">Login here</a></p>';
				 	
		} //end if
		else // if there were errors
		{
			print '<p>Sorry but the form could not be submitted at this time for the following reasons</p>'.
				  '<p>'.$errorMessage.'<br><br>'. // display the error message
				  '<br><br><input type="submit" value="&lt;- Back to Registraion Form" onclick="previousPage()" /></p>'; // display back link
		}
	?>
		</div>
		<div id="main_content_right">
			<h1>Membership Types</h1>
	<p>With 3 great Gym pass type you can be sure to pay the right amount to suit your monthly needs. See below for more information.</p>
	
	<div class="medal">
		<div class="gold">Gold</div><img src="../images/gold-medal.png" alt="gold medal" /><div class="cost">$50.00 per month</div>
		<ul>
			<li>Includes access to the Gym</li>
			<li>Unlimited Access to all group fitness classes</li>
			<li>Unlimited Access to tennis and squash courts anytime when free</li>
			<li>Unlimited access to all gym equipment in weights and cardio room</li>
			<li>Unlimited access  to indoor pool and spa</li>
		</ul>
	</div>
			
	<div class="medal">
		<div class="silver">Silver</div><img src="../images/silver-medal.png" alt="silver medal" /><div class="cost">$35.00 per month</div>
		<ul>
			<li>Can sign up to 2 group fitness classes per week with no additional cost</li>
			<li>Can use tennis and squash courts up to 2 times per week for no additional cost</li>
			<li>Unlimited access to all gym equipment in weights and cardio room</li>
			<li>Unlimited access  to indoor pool and spa</li>
		</ul>
	</div>
		
	<div class="medal">
		<div class="bronze">Bronze</div><img src="../images/bronze-medal.png" alt="bronze medal" /><div class="cost">$20.00 per month</div>
		<ul>
		<li>Access to all gym equipment in weights and cardio room up to 3 days a week</li>
		<li>Unlimited access  to indoor pool and spa</li>
		</ul>
		</div> 		
	 </div><!-- end of main content right-->   

  </div><!-- End of main content -->
  
  <div id="footer">
	    <div id="footer_left"><h4>&copy; 2013 Paul King</h4></div>
	    <div id="footer_right">
	   <a href="../sitemap.php">Site Map</a> &nbsp;&nbsp;
	   <a href="../privacy.php">Privacy</a>
	    </div>
  </div><!-- End of footer -->
  
</div> <!-- end of Wrapper-->


</body>
</html>