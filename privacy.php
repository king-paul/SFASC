<?xml version="1.0" encoding="ISO-8859-1" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

<title>SFASC - Sweat Hut Fitness and Sporting Club</title>
<link rel="stylesheet" type="text/css" href="styles/site.css" />

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
    	<div id="login">
		<div id="icon"><img src="images/users.gif"></div>
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
   
   	<div class="content_area"> 
			<h1>Privacy</h1>
			<p>Sweat Hut's commitment to best practice in all areas of its activities extends to respecting and safeguarding the personal information of our clients and partners. Our privacy policy adheres to the National Privacy Principles of the Commonwealth Privacy Act 1988 (Privacy Act). Collecting Information
 			   All information collected by Sweat Hut is solely for the purpose of providing better services to you. Typically, we will obtain personal information from you. This will include contact details and may include sensitive corporate information that is necessary for the delivery of services to you.</p>
			<h2>Use and Disclosure of Information</h2>
 			<p>Any personal information we obtain is used to help provide an efficient service to you and keep you informed of Sweat Hut's activities in other areas. In the course of providing our services Sweat Hut may need to disclose your personal information to other parties, but only when applicable. In every instance disclosure of personal information is undertaken only in strict accordance with the Privacy Act.</p> 
			<h2>Accuracy of Information</h2>
			<p>Sweat Hut takes all steps to ensure the information it retains is accurate and up to date. If any information is incorrect, please contact us immediately and we will promptly correct it. All information Sweat Hut holds is protected in a secure environment. Computer database information is protected by firewalls and also requires password access.</p>
			<h2>Accessing your details</h2>
			<p>If we hold information in regards to you or your company to ensure you can access it at anytime. This is subject to any exemptions outlined in the Privacy Act. If for any reason you are not allowed to access to your information, you will be informed of the relevant exemption clause under the Act. If any costs are incurred in relation to information access, Sweat Hut may charge a fee for this service.</p>
			<h2>Additional information</h2>
 			<p>If you require further information about how Sweat Hut helps safeguard your privacy, or wish to update your details, please contact Sweat Hut Fitness Clubs on 1300 888 879.</p>
			<p><strong>Disclaimer:</strong> The information provided within the Sweat Hut website has been prepared solely to assist you in evaluating the many benefits of taking discussions with the company further. The information has been prepared in good faith with due care by Sweat Hut Fitness Clubs.</p>
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
