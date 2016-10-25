<?php require_once("includes/session.php");?>
<?php require_once("includes/functions.php");?>
<?php include("includes/connection.php");?>
<?php
if(empty($_SESSION['LoggedIn']) && empty($_SESSION['Username']))
{
    redirect_to("homepage.php");
}
else
{ 
    include("includes/templates/header.php");
    include("includes/templates/aside.php");
    
	//**** fetching data for displaying user STATS
	//**** two consecutive indexes in array stores eventname and event id of one event
    
    $userid = $_SESSION['Userid'];
    $attended = array();
    $unattended = array();
    $upcoming = array();
    $pastorganized = array();
    $upcomingorganized = array();
        
    $getupcoming = mysqli_query($connection, "SELECT eventname,eventingdata.eventid FROM events, eventingdata WHERE events.eventid=eventingdata.eventid AND eventingdata.userid=$userid AND eventstart > SYSDATE() AND events.userid<> $userid");
    while ($row = mysqli_fetch_array($getupcoming, MYSQLI_ASSOC)) {
        $upcoming[]= $row['eventname'];
        $upcoming[]= $row['eventid'];
    }
    
    $getattended = mysqli_query($connection, "SELECT eventname,eventingdata.eventid FROM events, eventingdata WHERE events.eventid=eventingdata.eventid AND eventingdata.userid=$userid AND eventend < SYSDATE() AND status=1 AND events.userid <> $userid");
    while ($row = mysqli_fetch_array($getattended, MYSQLI_ASSOC)) {
        $attended[]= $row['eventname'];
        $attended[]= $row['eventid'];
    }
    
    $getunattended = mysqli_query($connection, "SELECT eventname,eventingdata.eventid FROM events, eventingdata WHERE events.eventid=eventingdata.eventid AND eventingdata.userid=$userid AND eventend < SYSDATE() AND status=0");
    while ($row = mysqli_fetch_array($getunattended, MYSQLI_ASSOC)) {
        $unattended[]= $row['eventname'];
        $unattended[]= $row['eventid'];
    }
    
    $getpastorganized = mysqli_query($connection, "SELECT eventname,eventingdata.eventid FROM events, eventingdata WHERE events.eventid=eventingdata.eventid AND eventingdata.userid=$userid AND eventend < SYSDATE() AND events.userid = $userid ");
    while ($row = mysqli_fetch_array($getpastorganized , MYSQLI_ASSOC)) {
        $pastorganized[]= $row['eventname'];
        $pastorganized[]= $row['eventid'];
    }
    
    $getupcomingorganized = mysqli_query($connection, "SELECT eventname,eventingdata.eventid FROM events, eventingdata WHERE events.eventid=eventingdata.eventid AND eventingdata.userid=$userid AND eventstart > SYSDATE() AND events.userid = $userid");
    while ($row = mysqli_fetch_array($getupcomingorganized , MYSQLI_ASSOC)) {
        $upcomingorganized[]= $row['eventname'];   
        $upcomingorganized[]= $row['eventid'];
    } 
}

$i=count($attended);
$j=count($unattended);
$k=count($upcoming);
$l=count($pastorganized);
$m=count($upcomingorganized);

//for calculating the length of table according to the column having most entries
$counter = max($i,$j,$k);
   
echo "<article style=' height:40px; background-color:lightseagreen; '>
        <h1 style='color:white;font-size:1.5em;padding:0px;margin:0px;'>YOUR VOLUNTEERING STATS</h1>
    </article>
	";

// values are divided 2 beacause two consecutive indexes have data for one event
echo"	
		<article>
			<table id='stats'>
		  <tr>
			<th colspan='2'>Past Events (",($i+$j)/2," )</th>
			<th rowspan='2'>Upcoming Events (",$k/2," )</th>
		  </tr>
		  <tr>
			<th  >Attended (",$i/2," ) </td>
			<th  >Not Attended (",$j/2," ) </td>

		  </tr>
	  ";

$c=0;



while($c < $counter){
	
	// +1 increment in anchor tag because index of events in data base starts with 1
  echo"<tr>";
    if($c < $i) 
        echo"<td><a href='single_event.php?id=".$attended[$c+1]."'>",$attended[$c],"</a></td>";
    else
        echo"<td></td>";
    if($c < $j) 
        echo"<td><a href='single_event.php?id=".$unattended[$c+1]."'>",$unattended[$c],"</a></td>";
    else
        echo"<td></td>";
    if($c < $k) 
        echo"<td><a href='single_event.php?id=".$upcoming[$c+1]."'>",$upcoming[$c],"</a></td>";
    else
        echo"<td></td>";
  echo"</tr>";
    
    $c=$c+2;  // incremented by 2 beacause two consecutive indexes have data for one event
}
  echo" </table> 
   </article>";

echo "<article style=' height:40px; background-color:lightseagreen; '>
        <h1 style='color:white;font-size:1.5em;padding:0px;margin:0px;'>EVENTS ORGANIZED</h1>
    </article>";

echo"<article>
        <table id='stats'>
  <tr>
    <th >Past Events (",$l/2," )</th>
    <th >Upcoming Events (",$m/2,")</th>
  </tr>";

//for calculating the length of table according to the column having most entries
$counter = max($m,$l);
$c=0;

while($c < $counter){
  echo"<tr>";
    if($c < $l) 
        echo"<td><a href='single_event.php?id=".$pastorganized[$c+1]."'>",$pastorganized[$c],"</a></td>";
    else
        echo"<td></td>";
    if($c < $m) 
        echo"<td><a href='single_event.php?id=".$upcomingorganized[$c+1]."'>",$upcomingorganized[$c],"</a></td>";
    else
        echo"<td></td>";
    
  echo"</tr>";
    
    $c=$c+2;
}
  echo" </table> 
   </article>";

?> 



<?php include("includes/templates/footer.php")?>