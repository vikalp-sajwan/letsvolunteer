<?php require_once("includes/session.php");?>
<?php include("includes/connection.php");?>
<?php include("includes/templates/header.php");?>
<?php include("includes/templates/aside.php");?>

<?php
    $eventid = $_GET['id'];
    $getevents = mysqli_query($connection, "SELECT * FROM events WHERE eventid=$eventid");
    
   
        $row = mysqli_fetch_array($getevents, MYSQLI_ASSOC);

        $organizer = $row['userid'];
        $eventname = $row['eventname'];
        $eventplace = $row['eventplace'];
        $eventdescription = $row['eventdescription'];
        $eventimg = $row['eventimg'];
        $eventstart = strtotime($row['eventstart']);
        $eventend = strtotime($row['eventend']);
        
      
        $getorganizer = mysqli_query($connection, "SELECT username, contact FROM users WHERE userid = '$organizer'");
        $row=mysqli_fetch_array($getorganizer, MYSQLI_ASSOC);

        $getnumberofvolunteers = mysqli_query($connection, "SELECT * FROM eventingdata WHERE eventid=$eventid AND status=1");
        $numofvolunteers=mysqli_num_rows($getnumberofvolunteers);
        
        
        $username = $row['username'];
          echo " <article>";
        echo "<h1>",$eventname;
        echo "</h1> <b>Place of event: ",$eventplace;
         if(date("j F Y", $eventstart) == date("j F Y", $eventend)){
    echo "</b> <br> <b>Event Timings: ",date("j F Y , h:i a", $eventstart);
    echo " - ",date("h:i a", $eventend);
         }
   else{
        echo "</b> <br> <b>Event Start: ",date("j F Y , h:i a", $eventstart);
        echo "</b> <br> <b>Event End: ",date("j F Y , h:i a", $eventend);
   }
        echo "</b> <br> <b>Event Organizer: ",$row['username'];
        echo "</b> <br> <b>Contact Number: ",$row['contact'];
        echo "</b> <br> <b>Number of VOLUNTEERS: ",$numofvolunteers;
        
        
        
        if(!empty($_SESSION['LoggedIn'])){
            echo "<br><br>";
            $userid = $_SESSION['Userid'];
            $getstatus = mysqli_query($connection, "SELECT * FROM eventingdata WHERE userid = $userid AND eventid=$eventid");
            if($userid==$organizer){
                echo "<h2 style='color:orange'>MY EVENT</h2>";
            }
            else if(mysqli_num_rows($getstatus) == 1){
                echo "<a id='volunteer' href='enroll.php?enroll=0&id=$eventid&src=0'>Un-Volunteer</a>";
            }
            else{
                echo "<a id='volunteer' href='enroll.php?enroll=1&id=$eventid&src=0'>Volunteer</a>";
            }
        }
        
        echo "<br><br>";
        echo "</b> <img src='images/$eventimg' style='width:100%;height:250px'>";         
        echo "</b></p>  <p>",$eventdescription;
        echo "</p></article>";
    
 ?>   
   

<?php include("includes/templates/footer.php");?>