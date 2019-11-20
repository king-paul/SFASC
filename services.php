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
			<h1>Servcies</h1>
			<h2>Gym</h2>
			<p>Our Gym features a broad range of strength and fitness equipment that provides training for both Cardiovascular and weight lifting.
			   Importantly, it is staffed by a team of fitness professionals that are qualified, experienced and committed to our member's goals.
			   The health club offers a relaxed, non-threatening environment conducive to members maximising the benefits of their exercise.</p>
			<h2>Personal Trainers</h2>
			<p>In addition to quality exercise equipment and a supportive atmosphere, we also offer	Certified Personal Trainers which can help you launch a smart exercise program.</p>
			<p>A personalised program will be created to suit your current fitness levels and the goals that you would like to achieve while taking into account your exercise experience and preferred activities.
			   All of the trainers at our facility are fully qualified and have a genuine passion in ensuring that their clients are successful with their programs while still enjoying each and every session.</p>			
			<h2>Group Fitness Classes</h2>
			<p>Our timetable offers an extensive range of classes including our unique circuit and kettle bell classes.
			   We Also run classes in Zumba fitness, cycling, cardio boxing and aerobics. From beginners to advanced, there is something for everyone.</p>
			<h2>Swimming Lessons</h2>
			<p>With drowning statistics increasing annually, equipping yourself or your child with the skills of survival in and around water is priceless.
			   Our focus is the provide an experienced and high quality instructors in an environment where students of all ages (from 6 months) are able to progress more rapidly.</p>
			<p>With our 25 metre heated indoor pool, we offer swimming lessons for infants from 6 months of age, up to school age lessons, stroke development for older and children and even adult learn to swim lessons.</p>
			<h2>Sporting Facilites</h2>
			<p>We have a range of Tennis and squash courts for hire available to people of all ages. Clubs are also available with certified coaches who can provide lessons to all experiences levels.
			Clubs cater for the novice and the experienced, and foster new friendships that can last a lifetime. They also organise social activities that you'll talk about for years to come.</p>
		</div>
		<div id="main_content_right">
			<img src="images/personaltrainer.jpg" width="280" height ="186" alt="personal training" />
			<img src="images/group_exercise_ladies.jpg" width="280" height ="187" alt="ladies group exercise" />
			<img src="images/water_aerobics.jpg" width="280" height ="179" alt="water aerobices" />
			<img src="images/squash_court.jpg" width="280" height="182" alt="squash court picture" />
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
