<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>SFASC - Sweat Hut Fitness and Sporting Club</title>
<!-- script type="text/javascript" src="register.js"></script-->

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
    <h1>Register</h1>
    <p>If you would like to become a sign up with us and enjpoy all our exclusive membership offers please fill in the form below and we shall contact you via email.</p>        
    
    <?php 
	
	require_once('script/common.php'); // includes functions from common.php file	
	
	if(!isset($_POST['Submit_btn']))
	{
	?>
    <form id="reg_form" action="script/reg-confirm.php" method="post" name="registration_form">
      <div class="form_section">
      	<table width="100%" cellpadding="0">
          <tr><td colspan="2"><h5>Login information</h5></td></tr>
          <tr><td width="22%">Email Address:</td><td width="78%"><input type="text" size="25" id="email_address" name="email address"/>
          <span class="asterix">*</span> </td></tr>
          <tr><td>Password:</td><td><input type="password" size="25" name="password"/>
          <span class="asterix">*</span> (Must be a miniumum of 8 characters)</td></tr>
          <tr><td>Confirm Password:</td><td><input type="password" size="25" name="confirm password"/>
          <span class="asterix">*</span> </td></tr>   
        </table>
      </div>
      <div class="form_section">
        <table width="100%" cellpadding="1" cellspacing="0">
          <tr><td colspan="5"><h5>Name</h5></td></tr>
          <tr>
            <td width="14%">First Name:</td><td width="36%"> <input type="text" name="first name"  />
            <span class="asterix">*</span> </td>
            <td><h5>Date Of Birth</h5></td>                
            </tr>
          <tr>
            <td>Last Name:</td><td> <input type="text" name="last name" />
            <span class="asterix">*</span> </td>     
            <td width="50%">Day: <select id="born_day" name="day born">
                <option value="1">1</option><option value="2">2</option><option value="3">3</option>
                <option value="4">4</option><option value="5">5</option><option value="61">6</option>
                <option value="7">7</option><option value="8">8</option><option value="9">9</option>
                <option value="10">10</option><option value="11">11</option><option value="12">12</option>
                <option value="13">13</option><option value="14">14</option><option value="15">15</option>
                <option value="16">16</option><option value="17">17</option><option value="18">18</option>
                <option value="19">19</option><option value="20">20</option><option value="21">21</option>
                <option value="22">22</option><option value="23">23</option><option value="24">24</option>
                <option value="25">25</option><option value="26">26</option><option value="27">27</option>
                <option value="28">28</option><option value="29">29</option><option value="30">30</option>
                <option value="31">31</option>				
                </select>
                Month: <select id="born_month" name="month born" >
                <option value="1">1</option><option value="2">2</option><option value="3">3</option>
                <option value="4">4</option><option value="5">5</option><option value="61">6</option>
                <option value="7">7</option><option value="8">8</option><option value="9">9</option>
                <option value="10">10</option><option value="11">11</option><option value="12">12</option>
                </select>
                Year: <input type="number" class="text" size ="5"  maxlength="4" min="1900" max="2013" id="born_year" name="year born" />
                <span class="asterix">*</span> </td>
            </tr>
            <tr>
            <td><h5>Gender:</h5></td>
            <td>Male <input type="radio" name="gender" id="gender1" value="male" />
                Female <input type="radio" name="gender" id="gender2" value="female" />
            </td>
            
            </tr>
        </table> 
      </div>

      <div class="form_section">
      	<table width="100%" cellpadding="0">
          <tr><td colspan="6"><h5>Contact Details</h5></td></tr>
          <tr><td width="15%">Street Address:</td><td colspan="2"><input type="text" size="50" id="street_address" name="street address" />
          <span class="asterix">*</span> </td></tr>
          <tr><td>Suburb:</td><td width="18%"><input type="text" size="16" id="suburb" name="suburb" />
          <span class="asterix">*</span> </td>
          <td colspan="2">Post Code: <input type="text" size="4" maxlength="4" min="1000" max="9999" id="postcode" name="postcode" />
          <span class="asterix">*</span> </td></tr>
      	</table>
        <table width="100%" >   
          <tr><td colspan="6"><h5>Telephone Number</h5></td></tr>
          <tr><td>Home:</td><td><input type="text" size="8" maxlength="8" id="home_phone" name="home phone" /></td>
          <td>Work:</td><td><input type="text" size="8" id="work_phone" name="work phone" /></td>
          <td>Mobile:</td><td><input type="text" size="10" maxlength="10" id="mobile_phone" name="mobile phone" /></td></tr>
          <tr><td>Fax:</td><td><input type="text" size="8" id="fax_number" name="fax number" /></td></tr>
        </table>
      </div>
      
      <div class="form_section">
        <table cellpadding="0" width="100%">
          <tr><td width="90">Membership Type:<td width="190"><select id="membership_type" name="membership type">
          <option value="Bronze">Bronze ($20 per month)</option>
          <option value="Silver">Silver ($35 per month)</option>
          <option value="Gold">Gold ($50 per month)</option>
          </select> <span class="asterix">*</span></td>
          </tr>
          <tr><td>Duration of Membership:</td><td><select id="membership_duration" name="membership duration">
             <option value="Annual">Annual</option>
             <option value="5 Years">5 Years (Save 20%)</option>
             <option value="10 Years">10 Years (Save 40%)</option>
             <option value="Lifetime">Lifetime (Save 60%)</option> 
            </select> <span class="asterix">*</span> </td> </tr> 
          </table>
      </div>    
      
      <div class="form_section">                     
                <h5>CREDIT CARD DETAILS</h5>
                Visa <input type="radio" name="card company" value ="visa" />
                Mastercard <input type="radio" name="card company" value ="mastercard" />
                <span class="asterix">*</span><br />
                Cardholder Name: <input type="text" size="25" name="cardholder name" />
                <span class="asterix">*</span><br />
                Credit Card No. <input type="text" size="20" maxlength="16" name="card number" />
                <span class="asterix">*</span><br />
                Expirey Date: <select name="expiry month">
                <option value="1">01</option><option value="2">02</option><option value="3">03</option>
                <option value="4">04</option><option value="5">05</option><option value="61">06</option>
                <option value="7">07</option><option value="8">08</option><option value="9">09</option>
                <option value="10">10</option><option value="11">11</option><option value="12">12</option>
                </select>
                / <input type="number" size="3" maxlength="2" name="expiry year" />
                <span class="asterix">*</span><br />
                Verification Code: <input type="text" size="2" maxlength="3" name="verification code" />
                <span class="asterix">*</span>(This is your 3 digit code on the back of your card)      
       </div> 
       
       <input type="submit" name="Submit_btn" value="Proceed" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       Note:<span class="asterix">*</span>means a require field     
    </form>
    
    <?php
	}
	/*
	else
	{	
		// check all values in registraion section of form and return errors
		$errorMessage = checkForm(); 
		// check all values in credit card section of form and return errors
		$errorMessage = checkCreditCard($errorMessage);
		
		if($errorMessage == '') // if everything in the form on the previous page was entered correctly
		{ // display the credit card form
			print '<p>You have entered the following details</p>'.
				  '<h5>Login Details</h5>'.
				  'Email Address:'.$_POST['email_address'].'<br>'.
				  'Password: ********'.
				  '<h5>Member Details</h5>'.			   
				  '<p><b>First Name: </b>'.$_POST['first_name'].'<br>'.
				  '<b>Last Name: </b>'.$_POST['last_name'].'<br>'.
				  '<b>Gender: </b> ';
				  if(isset($_POST['gender'])){ echo $_POST['gender']; }
			 print'<br><b>Date Of Birth: </b>'.$_POST['day_born'].'/'.$_POST['month_born'].'/'.$_POST['year_born'].'<br><br>'.
				  '<b>Address: </b>'.$_POST['street_address'].', '.$_POST['suburb'].', '.$_POST['postcode'].'<br>'.
				  '<b>Phone Number</b><br>'.
				  '<b>Home: </b>'.$_POST['home_phone'].'<b>  Mobile: </b>'.$_POST['mobile_phone'].'<b>  Work: </b>'.$_POST['work_phone'].
				  '<b>  Fax: </b>'.$_POST['fax_number'].'<br><br>'.
				  '<h5>Membership info</h5>'.
				  '<b>Memberhsip Level: </b>'.$_POST['membership_type'].'<br>'.
				  '<b>Memberhsip Duration: </b>'.$_POST['membership_duration'].'<br><hr>';
				 
			print'<h5>Credit Card Details</h5>
				 <b>Card Company: </b>'.$_POST['card_company'].'<br>
				 <b>Cardholder Name: </b>'.$_POST['cardholder_name'].'<br>
				 <b>Credit Card No.: </b>'.$_POST['card_number'].'<br>
				 <b>Expirey Date: </b>'.$_POST['expiry_month'].'/'.$_POST['expiry_year'].'<br>
				 <b>Verification Code:</b> ***<br><br>';	
	?>
			<hr />
			<p>If you are happy with the above information and would like to submit the form click the button below.</p>    
			<form action="script/confirmation.php" method="post"> 
			  <input type="submit" name="confirmRegBtn" value="Confirm Registraion"  />
			</form>
	<?php			
		} // if there were erros in the form
		else
		{
			print '<p>Sorry but the form could not be submitted at this time for the following reasons<p>';
			print $errorMessage; // display the error message
		
	?>
		<br><br><input type="submit" value="&lt;- Back to Registraion Form" onclick="previousPage()" />
		<?php
        } // end of if/else for error checking

	} // end of submit button checking*/
	?>
   
	</div><!-- end of left content -->
        
	<div id="main_content_right">
			<h1>Membership Types</h1>
	<p>With 3 great Gym pass type you can be sure to pay the right amount to suit your monthly needs. See below for more information.</p>
	
	<div class="medal">
		<div class="gold">Gold</div><img src="images/gold-medal.png" alt="gold medal" /><div class="cost">$50.00 per month</div>
		<ul>
			<li>Includes access to the Gym</li>
			<li>Unlimited Access to all group fitness classes</li>
			<li>Unlimited Access to tennis and squash courts anytime when free</li>
			<li>Unlimited access to all gym equipment in weights and cardio room</li>
			<li>Unlimited access  to indoor pool and spa</li>
		</ul>
	</div>
			
	<div class="medal">
		<div class="silver">Silver</div><img src="images/silver-medal.png" alt="silver medal" /><div class="cost">$35.00 per month</div>
		<ul>
			<li>Can sign up to 2 group fitness classes per week with no additional cost</li>
			<li>Can use tennis and squash courts up to 2 times per week for no additional cost</li>
			<li>Unlimited access to all gym equipment in weights and cardio room</li>
			<li>Unlimited access  to indoor pool and spa</li>
		</ul>
	</div>
		
	<div class="medal">
		<div class="bronze">Bronze</div><img src="images/bronze-medal.png" alt="bronze medal" /><div class="cost">$20.00 per month</div>
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
	   <a href="Assignments/sitemap.php">Site Map</a> &nbsp;&nbsp;
	   <a href="RMIT/Assignments/privacy.php">Privacy</a>
    </div>
  </div><!-- End of footer -->
  
</div> <!-- end of Wrapper-->

</body>
</html>
