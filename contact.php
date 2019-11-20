<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>SFASC - Sweat Hut Fitness and Sporting Club</title>
<link rel="stylesheet" type="text/css" href="styles/site.css" />

</head>

<body>

<?php
	//require('script/common.php');

	$mailSent = false;

	if(isset($_POST['submit_button']))
	{			
		// read fields from form
		$name = $_POST['name'];
		$email = $_POST['email_address'];
		$subject = $_POST['email_topic'];
		$message = $_POST['message'];
		$mail_header = "From: ". $name . " <" . $email . ">\r\n";
		
		if(!checkEmailExpression($email))
		{
			echo "The email address is invalid.";
		}
		
		if(empty($name) || !checkEmailExpression($email) || empty($subject)) // if any of the fields are emtpy
		{
			echo "<script type=\"text/javascript\">";
			echo "alert(\"The email could not be sent because one or more fields are empty or invalid.\")";
			echo "</script>";
		}
		else
		{
			// otherwise send the email
			// real email - "admin@sfasc.com.au"		
			mail("admin@sfasc.com.au", $subject, $message, $mail_header);
			
			$mailSent = true;
			
			//echo "Your email has been sent";
		}
		
	} // end if isset
	
	function checkEmailExpression($emailAddress) // checks if the email address is valid
	{
		$emailExpression = "/^[a-zA-Z0-9_\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/"; // regular expression that the email address much match
		
		if(preg_match($emailExpression, $emailAddress))
			return true;
		else
			return false;
		// end if
	}

?>

<div id="wrapper">

 <div id="header">
    
	<div id="logo">
	   	<img src="images/logo.gif" alt="SFASC logo" />
	</div> 
	<div id="banner">
	    <h3>Sweat Hut Fitness and Sporting Club</h3>
	    <h4>Convenient, affordable, and fun sport and fitness</h4>
	</div> 
    
	<div id="login">
		<!--<div id="icon"><img src="images/users.gif"></div>-->
        <?php
		include('script/common.php');
		checkLoginStatus();
		?>
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
   
		<div id="main_content_left">
			<h1>Contact Us</h1>
			<h2>Our location</h2>
			<p>761 Canning Highway<br />
			   Applecross, WA 6153</p>			
			<p>If you have any enquries feel free to contact us with the details below<br />
			<strong>Telephone:</strong>6363 5830.<br />
			<strong>Email:</strong><a href="mailto:admin@sfasc.com.au">admin@sfasc.com.au</a></p>
			<p>Alternatively fill out the email form below</p>
			
			<div id="form_area">
				<form action="contact.php" method="post">
					Your Name:<br />
					<input type="text" size="16" name="name" /><br />
					Your email Address:<br />
					<input type="text" size="25" name="email_address" /><br />
					Topic:<br />
					<input type="text" size="25" name="email_topic" /><br />
					<textarea name="message" rows="10" cols="40">Type your message here</textarea><br />
					<input type="submit" name="submit_button" value="send message" />
				</form>
			</div>
			
			<?php 
				if($mailSent == true)
					echo "<p><strong>Your message has been sent.</strong></p>";				
			?>
			
		</div>
		
		<div id="main_content_right">
		<img src="images/outside-gym.jpg" width="280" height ="210"  alt="photo of building"/>
			<br /><br />
		<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.au/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=761+Canning+Highway,+Applecross,+WA,+6153&amp;aq=0&amp;oq=761+Canning+Highway%09%09%09+++Applecross,+WA+6153&amp;sll=-37.926868,147.458496&amp;sspn=12.745871,35.15625&amp;ie=UTF8&amp;hq=&amp;hnear=761+Canning+Hwy,+Applecross+Western+Australia+6153&amp;t=m&amp;ll=-32.02154,115.832634&amp;spn=0.021831,0.025749&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br />
		<small><a href="https://maps.google.com.au/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=761+Canning+Highway,+Applecross,+WA,+6153&amp;aq=0&amp;oq=761+Canning+Highway%09%09%09+++Applecross,+WA+6153&amp;sll=-37.926868,147.458496&amp;sspn=12.745871,35.15625&amp;ie=UTF8&amp;hq=&amp;hnear=761+Canning+Hwy,+Applecross+Western+Australia+6153&amp;t=m&amp;ll=-32.02154,115.832634&amp;spn=0.021831,0.025749&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></small>
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
