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
		<h1 align="center">Booking Confirmation</h1>
         <p>The bookings have been added</p>
         <p><a href="../timetable.php">&lt; back to timetable</a></p>        
	</div> 

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