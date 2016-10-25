<?php require_once("includes/session.php");?>
<?php include("includes/connection.php");?>
<?php include("includes/templates/header.php");?>
<?php include("includes/templates/aside.php");?>
<?php
if(!empty($_POST['eventname']))
{
    $userid = $_SESSION['Userid'];
    $eventname = mysqli_real_escape_string($connection,$_POST['eventname']);
    $eventplace = mysqli_real_escape_string($connection,$_POST['eventplace']);
    $eventstart = $_POST['eventstart'];
    $eventend = $_POST['eventend'];
    $eventdescription = mysqli_real_escape_string($connection,$_POST['eventdescription']);
    
        
     
        $registerquery = mysqli_query($connection,"INSERT INTO events (userid, eventname, eventplace, eventstart, eventend, eventdescription) 
        VALUES('".$userid."','". $eventname."','".  $eventplace."','". $eventstart."','". $eventend."','".  $eventdescription."')");
        if($registerquery)
        {
            $geteventid = mysqli_query($connection,"SELECT eventid FROM events WHERE eventname='".$eventname."' AND userid=$userid");
            $row = mysqli_fetch_array($geteventid, MYSQLI_ASSOC);
            $eventid = $row['eventid'];
            mysqli_query($connection,"INSERT INTO eventingdata (eventid, userid) VALUES($eventid,$userid)");
            echo "<h1>Success</h1>";
            echo "<p>Your event was successfully created. Please <a href=\"single_event.php?id=$eventid\">Go to event page</a>.</p>";
        }
        else
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, event creation failed. Please go back and try again.</p>";    
        }       
     
}
else
{
?>
   <article>  
   <h1>Enter Event Details</h1>
     
        <form method="post" action="create_event.php" name="createeventform" id="createeventform">
    
        <table>
        <tr>
            <td><label for="eventname">Event Title:</label></td>
            <td><input type="text" name="eventname" id="eventname " placeholder="Enter Event Name" autofocus required/></td>
        </tr>
        
        <tr>
            <td><label for="eventplace">Place of Event:</label></td>
            <td><input type="text" name="eventplace" id="eventplace" placeholder="Enter Event Place" required/></td>
        
        </tr>
        <tr>
            <td><label for="eventstart">Date and Time of Start of Event:</label></td>
            <td><input type="datetime-local" name="eventstart"/></td>
        </tr>
        <tr>
            <td><label for="eventend">Date and Time of End of Event:</label></td>
            <td><input type="datetime-local" name="eventend"/></td>
        </tr>
        <tr>
            <td><label for="eventdescription">Description of Event:</label></td>
            <td><TEXTAREA  name="eventdescription" id="eventdescription" rows="12" cols="50" >
</TEXTAREA></td>
        </tr>
       
            <td></td>
            <td>
                <input type="submit" name="register" id="register" value="Register" />
            </td>
        </tr>    
        </table>
    </form>
    
    </article>
     
    <?php
}
?>
 



<?php include("includes/templates/footer.php");?>