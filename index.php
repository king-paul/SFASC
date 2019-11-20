<?php
session_start();
?>
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
		//session_start();
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
		<h1>Sweat Hut Fitness and Sporting Club</h1>
			<p>Welcome to Sweat Hut Fitness and Sporting Club, located in Perth. We are the perfect gym to cater for individual families and companies.
			Whether your health goals are to lose weight or to just stay fit, our well trained staff and modern equipment will meet all your requirements.</p>
			
			<p>Sweat Hut Fitness Club is driven and ambitious in supporting our members and members' goals.
			A local activist within the local community, SFASC aim to be the catalyst that unites and inspire our local community to be fitter and healthier than ever before.</p>
			
			<p>The cornerstone of our Centre is our redeveloped gym and health club equipped with state of the art fitness equipment.
			Operating from the health club are a range of group fitness programs. Our timetable features a variety of classes to suit everyone.</p>
			
			<p>With our features that include a cardio room, weights gym, group fitness gym, heated indoor swimming pool, tennis and squash courts, as well as a childcare centre,
			you can be sure that there will be something here to fit anybody's needs.</p>
			
			<p>Currently we are open 7 days a week 8:00am to 8:00 pm and provide childcare Monday to Friday.</p>			
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