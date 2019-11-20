<?php
session_start();
session_unset(); // clear all variables in the session
session_destroy(); // end the current session
//echo 'You have now logged out';
header('Location: ../index.php'); // go back to home page
?>

<!--<a href="../index.php">Back to Home Page</a>-->