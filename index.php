<?php require_once("includes/session.php");?>
<?php require_once("includes/functions.php");?>
<?php include("includes/connection.php");?>
<?php

// user logged in -- go to userhome
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
    redirect_to("userhome.php");
	//echo "<meta http-equiv='refresh' content='0 ;userhome.php' />";   
}
// user not logged in -- go to general homepage
else
{ 
    redirect_to("homepage.php");
}
?>
