<?php require_once("includes/session.php");?>
<?php include("includes/connection.php");?>
<?php include("includes/templates/header.php");?>
<?php include("includes/templates/aside.php");?>
        
	<section  id="introduction">
			<img src="images/volunteer.jpg">
			<p>letsvolunteer.org provides a platform for people and organisations to connect with people 
				who are wanting to volunteer and support for a good cause.</p>
	</section>

    <article style=' height:40px; background-color:lightseagreen; '>
        <h1 style='color:white;font-size:1.5em;padding:0px;margin:0px;'>RECENT EVENTS</h1>
    </article>
       
<?php
    
	// #### get covered events data from database and show in homepage.

    $getevents = mysqli_query($connection, "SELECT * FROM coveredevents ORDER BY submissiondate  DESC LIMIT 5");
    
    while ($row = mysqli_fetch_array($getevents, MYSQLI_ASSOC)) {
        
        $eventid = $row['eventid'];
        $userid = $row['userid'];
        $eventintro = $row['eventintro'];
        $eventpara = $row['eventpara'];
        $pic1 = $row['pic1'];
               
        $geteventdetails = mysqli_query($connection, "SELECT eventname, eventstart, eventend, eventplace FROM events WHERE eventid = '$eventid'");
        $row=mysqli_fetch_array($geteventdetails, MYSQLI_ASSOC);
        
        $eventname = $row['eventname'];
        $eventstart = strtotime($row['eventstart']); 
        $eventend = strtotime($row['eventend']); 
        $eventplace = $row['eventplace'];        
      
        $getorganizer = mysqli_query($connection, "SELECT username FROM users WHERE userid = '$userid'");
        $row=mysqli_fetch_array($getorganizer, MYSQLI_ASSOC);
        
        $username = $row['username'];
        
        echo " <article>";
        echo "<h1><a href='event_news.php?id=$eventid'>",$eventname;
        echo "</a></h1> <b>Place of event: ",$eventplace;
        
		if(date("j F Y", $eventstart) == date("j F Y", $eventend)){
			echo "</b> <br> <b>Event Timings: ",date("j F Y , h:i a", $eventstart);
			echo " - ",date("h:i a", $eventend);
		}
	    else{
			echo "</b> <br> <b>Event Start: ",date("j F Y , h:i a", $eventstart);
			echo "</b> <br> <b>Event End: ",date("j F Y , h:i a", $eventend);
	    }
		
        echo "</b> <br> <b>Event Organizer: ",$username;
        echo "</b>  <img src='images/$pic1' style='width:100%;height:350px'>";        
        echo "</b>  <p>",$eventintro;
        echo "</p></article>";
    
    }
 ?>   
<?php include("includes/templates/footer.php");?>