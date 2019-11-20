<?php
session_start();
ob_start(); // clear any information sent bt the header

include('script/common.php');

$GLOBALS['activityID'] = array();
$_SESSION['bookings'] = array();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
        <?php checkLoginStatus(); ?>
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
  
    <h1 align="center">Timetable</h1>
      
    <form action="" method="post"><!--script/booking-confirmation.php-->
	<?php 
	
	drawTimetable(15, 8);  // function that displays the timetable on the screen
	if(isset($_SESSION['username']))
	{
	?>
    <div id="confirm_booking">
    <input type="submit" name="submit_btn" value="Add Bookings" />    
    </div>
    <?php
	} //end if
	
	if(isset($_POST['submit_btn']))
	{
		for($i=0; $i<count($GLOBALS['activityID']); $i++)
		{
			if(isset($_POST['checkbox'.$GLOBALS['activityID'][$i]]))
			{
				//echo '<b>checked</b>: activity '.$GLOBALS['activityID'][$i].'<br>';
				addBooking($_SESSION['username'], $GLOBALS['activityID'][$i]);
				updateActivityPlaces($GLOBALS['activityID'][$i], 'remove', '');
				
				unset($_POST['checkbox'.$GLOBALS['activityID'][$i]]);
				unset($_POST['submit_btn']);			
			}//end if	
							
		} // end of for loop
		
		header('Location: script/booking-confirm.php');
		ob_flush();
		
	} //end if
	?>
    
    </form>
	      
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

<?php
function drawTimetable($rowsTotal, $columnsTotal)
{
	$days=array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
	$times=array('9:30am', '10:00am', '10:30am', '11:30am', '12:00pm', '12:30am', '1:00pm', '2:00pm', '3:00pm', '4:00pm', '5:00pm', '6:00pm', '7:00pm');
	
	$activityString = '';
	
	echo '<table border="1px" cellspacing="0" bgcolor="#EEEEEE">'; // create a new table	
	// nested for loops for drawing the table and its data on the page
	for($row=0; $row<$rowsTotal-1; $row++) // loop through each row
	{	   
		echo '<tr>';
		if($row == 0)
		  echo '<td bgcolor="#666666"></td>';
		else
		  echo '<td bgcolor="#666666"><font color="#FFFFFF"><b>'.$times[$row-1].'</b></font></td>';
		//end if/else
		for($column=0; $column<$columnsTotal-1; $column++) // loop through each column
		{				
			  if($row == 0)
			  {
				  echo '<td bgcolor="#666666" width="150" height="50" align="center">';
				  echo '<font color="#FFFFFF"><b>'.$days[$column].'</b></font>';
			  }
			  else
			  {					
				  $activityString = getActivity($days[$column], $times[$row-1]);
				  
				  if($activityString != '')
					  print '<td bgcolor="#00FF00" valign="top" align="left" width="150" height="60">'.$activityString.'</td>';
				  else									
					  print '<td bgcolor="#EEEEEE" valign="top" align="left" width="150" height="60"></td>';
				  // end if										
			  }
			  //end if
			  //echo '</td>';
		}
		echo '</tr>';		  
		// end if
	}// end of for loop
	echo '</table>';
	
} // end of function

function checkActivity($day, $time)
{
	static $activitiesFound = 0;
	
	$activities = simplexml_load_file('xml/activities.xml');
	
	foreach($activities as $activity )
	{		
		if(($activity->day == $day) && ($activity->time == $time))
		{
			$activitiesFound++;
			// print the activity information in cell
			return'<br> $activity->title'.'<br>'.
				  '<b>Instructor:</b> '.$activity->instructor.'<br>';
				  '<b>Places Remaining:</b> '.$activity->placesLeft.'<br>'.
				  'activitities found: '.$activitiesFound.'<br><br>';	
			
			//return $returnString;		
		}	
	}
	return '';//<td bgcolor="#EEEEEE" valign="top" align="left" width="150" height="60"></td>';
	//return false;
}

function getActivity($day, $time)
{
	$activities = simplexml_load_file('xml/activities.xml'); //opens file
	
	foreach($activities as $activity)
	{
		if(($activity->day == $day) && ($activity->time == $time))
		{
			// add the activity from the xml file onto the end of the activityId array
			array_push($GLOBALS['activityID'], $activity->attributes()->id);
			//echo 'ActivityID: '.end($GLOBALS['activityID']).'<br>';

			// read the activity information
			$returnString = $activity->title.'<br>'.
				  			'<b>Instructor:</b> '.$activity->instructor.'<br>'.
				  			'<b>Places Remaining:</b> '.$activity->placesLeft.'<br>';
			
			// show checkbox if a use is logged in
			if(isset($_SESSION['username']))
			{		
				if(checkBooking($_SESSION['username'], $GLOBALS['activityID']))	
					// create a aheckbox with the last the value in the activityID array as part of the checkbox name
					$returnString=$returnString.'<input type="checkbox" name=checkbox'.end($GLOBALS['activityID']).' />Add this activity';
				else
					$returnString=$returnString.'<b>You have enrolled in this.</b>';
				// end if/else			  
			}				
			return $returnString; // returns the information for cell
		}
	}
	
	return ''; // return an empty string

} // end of function

function checkBooking($username, $activityID)
{
	$members = simplexml_load_file('xml/members.xml');
	
	foreach($members as $member)
	{
		// if the username is found in the file
		if($member->attributes()->username == $username)
		{			
			// check if the member already has the activity booked
			foreach($member->bookings->children() as $activity)
			{
				//echo 'Activity ID: '.$activity.'<br>';
				if((string)$activity == $activityID)
				{
					echo 'You are already enrolled in that activity.<br>';
					return false; // the user is already currently enrolled in the activity
				}//end if
			}
		 	
			return true; // the user is not currently enrolled in the activity
									
		} // end of if
		
	} // end of foreach loop	
	
	echo 'Error: The username '.$username.' in checkBooking function was not found';
	return false;
		
} // end of function

function addBooking($username, $activityID)
{
	$activities = simplexml_load_file('xml/activities.xml');
	$members = simplexml_load_file('xml/members.xml');
	
	foreach($members as $member)
	{
		// if the username is found in the file
		if($member->attributes()->username == $username)
		{			
			// check if the member already has the activity booked
			foreach($member->bookings->children() as $activity)
			{
				//echo 'Activity ID: '.$activity.'<br>';
				if((string)$activity == $activityID)
				{
					echo 'You are already enrolled in that activity.<br>';
					return; //exit function
				} //end if
			}
			//echo 'username found<br>';
			$member->bookings->addChild('activity', $activityID);			
			
			array_push($_SESSION['bookings'], $member);	
			//echo 'Activity: '.$activityID.' was booked succesfully.<br>';			
			
			$members->asXML('xml/members.xml');
						
			return; //exit function					
		}
		
	} // end of foreach loop
	// end of members xml code
	
	echo 'Error: The username '.$username.' in function addBooking was not found';
	
} // end of function
  
?>