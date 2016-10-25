<!-- #### code for the side bar -->
<div id="side">
    <?php
	  
	  // ***** if user is logged in -- show user related actions
      if(!empty($_SESSION['LoggedIn']) && empty(!$_SESSION['Username']))
      {
          echo"<section id='login'>";
		  echo"You are logged in as <b>",$_SESSION['Username'];
		  echo"</b> <br><br><a href='userhome.php'>MY ACCOUNT</a>";
		  echo"</b> <br><br><a href='create_event.php'>ORGANIZE AN EVENT</a>";
		  echo"<br><br><a href='logout.php'>LOGOUT</a>";
		  echo"</section>";
      }
	  // ***** if no one is logged in -- show login form and signup button
      else
      {
        echo"
            <section id='login'>
                <h1>Member Login</h1>
                <p>Thanks for visiting! Please either login below, or <a href='register.php'>SIGN UP</a>.</p>
                <form method='post' action='login.php' name='loginform' id='loginform'>
                  <table>
                    <tr>
                        <td><label for='username'>Username:</td>
                        <td></label><input class='field' type='text' name='username' id='username' /></td>
                    </tr>
                    <tr>
                        <td><label for='password'>Password: </label></td>
                        <td><input class='field' type='password' name='password' id='password' /></td>
                    </tr>
                    <tr>
                        <td><input type='submit' name='login' id='login' value='Login' /></td>
                    </tr>
                  </table>
                </form>
            </section>
        ";
      }
    ?>
    
    <?php
     	// ***** show 5 upcoming events in the upcoming events block
        $getevents = mysqli_query($connection, "SELECT eventname,eventid FROM events WHERE evententry = 1 AND eventstart > SYSDATE() ORDER BY eventstart LIMIT 5");

            echo " <section id='upcoming_events'>";
            echo "<h1>Upcoming Events</h1>";
            echo "<ul>";
            while($row = mysqli_fetch_array($getevents, MYSQLI_ASSOC)){
                echo "<li><a href='single_event.php?id=$row[eventid]'>$row[eventname]</a></li>";
            }
            echo "</ul></section>";

     ?>   
    
	<!-- links to some extraneous information -->
    <section id='facts'>
        <h1>FACTS</h1>
        <ul>
            <li>WWF foundation report</li>
            <li>UN global pollution report</li>
            <li>UNICEF malnutrition in india report</li>
        </ul>
    </section>
</div>