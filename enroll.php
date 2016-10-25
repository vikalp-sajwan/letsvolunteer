<?php require_once("includes/session.php");?>
<?php include("includes/connection.php");?>
<?php require_once("includes/functions.php");?>
<?php
    $userid = $_SESSION['Userid'];
    $eventid = $_GET['id'];
    $enroll = $_GET['enroll'];	// 1 -> volunteer OR 0 -> un-volunteer
    $src = $_GET['src'];	// source page for action -- events.php OR single_event.php
	if($enroll==1){
		mysqli_query($connection, "INSERT INTO eventingdata (eventid, userid) VALUES ($eventid, $userid)");
	}
	else if($enroll==0){
	   mysqli_query($connection, "DELETE FROM eventingdata WHERE eventid = $eventid AND userid = $userid"); 
	}

	if($src==1)	
		redirect_to("events.php");
	else if($src==0)
		redirect_to("single_event.php?id=$eventid");
?>   
