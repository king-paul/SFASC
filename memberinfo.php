<?php
ob_start(); // clear any information sent bt the header
session_start();
include('script/common.php');

function displayMemberInfo($index)
{	
	$IDs = array();

	$members = simplexml_load_file('xml/members.xml');
	$activities = simplexml_load_file('xml/activities.xml');
	
	print '<p><b>First Name: </b>'.htmlentities($members->member[$index]->firstname).'<br>'.
				 '<b>Last Name: </b>' .htmlentities($members->member[$index]->lastname).'<br>'.
				 '<b>Gender: </b>' .htmlentities($members->member[$index]->gender).'<br>'.
				 '<b>Date Of Birth: </b>'.htmlentities($members->member[$index]->DateOfBirth).'<br>'.
				 '<b>Address: </b>'.htmlentities($members->member[$index]->StreetAddress).', '.htmlentities($members->member[$index]->suburb).', '.
				 htmlentities($members->member[$index]->postcode).'<br>'.
				 '<b>Phone Number</b><br>'.
				 '<b>Home: </b>'.htmlentities($members->member[$index]->PhoneNumbers->home).
				 '<b>  Mobile: </b>'.htmlentities($members->member[$index]->PhoneNumbers->mobile).
				 '<b>  Work: </b>'.htmlentities($members->member[$index]->PhoneNumbers->work).
				 '<b>  Fax: </b>'.htmlentities($members->member[$index]->PhoneNumbers->fax).
				 '<b>Membership Level: </b>'.htmlentities($members->member[$index]->membership->level).'<br>'.
				 '<b>Membership Duration: </b>'.htmlentities($members->member[$index]->membership->duration).'<br><br>'.
				 '<b>Current Bookings</b> <a href="timetable.php">Add</a> / <a href="script/remove_bookings.php?deleteData=no">Remove</a>';				
				 //'You currently have no bookings. <a href=\'#\'>Edit</a></p>';
	
	print '<ul>';
			
	// loop through the both xml files looking for activity ID matches		 
	foreach($members->member[$index]->bookings->children() as $activityID)
	{		
		foreach($activities as $activity)
		{
			if((string)$activity->attributes()->id == (string)$activityID)
			{
					print '<li>'.htmlentities($activity->title).' on '.htmlentities($activity->day).' at '.htmlentities($activity->time).'</li>';			
			}
		}
		
	} // end of foreach loops
	
	echo '</ul>';
		
} //end of function

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
	  
	<div id="navbar">
		<div class="link"><a href="index.php"><span>Home</span></a></div>
		<div class="link"><a href="services.php"><span>Services</span></a></div>
		<div class="link"><a href="contact.php"><span>Contact Us</span></a></div>
		<div class="link"><a href="timetable.php"><span>Timetable</span></a></div>
		<div class="link"><a href="memberinfo.php?editData=no"><span>Member's Area</span></a></div>
	</div>
	  
  </div><!-- end of header -->
  
  <div id="main">
  
		<div id="main_content_left"><!-- left side of the screen -->
		
		<h1>Memberhsip Profile</h1>
		<br />
		
		<table bgcolor="EEEEEE" border="1" bordercolor="#FF0000" cellspacing="0" cellpadding="5">
		<tr>
		<td width="160"><img src="images/Users/user-male.png" alt="profile picture" width="150" height="210" /></td>  
		<td valign="top">
        
		<?php 
		if(isset($_SESSION['username']))
		{
			
			$membersFound = 0;
	
			$members = simplexml_load_file('xml/members.xml');	
		
			foreach($members as $member)
				$membersFound++;
			// end of loop
		
			//print_r($members);
			for($i=0; $i<$membersFound; $i++)
			{
				if ($members->member[$i]->attributes()->username == $_SESSION['username'])
				{
					displayMemberInfo($i); 
					break;
				}
				//end if
			}			
		}
		else
		{
			header('Location: login.php');
			ob_flush();
		}
		//end if/else
		?>
            </td>
		</tr>		
		</table>		
		
		
		</div>
		
		<div id="main_content_right">
			<img src="images/Users/members.jpg" alt="members" width="280" height="210" />	
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