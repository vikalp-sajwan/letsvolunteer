<?php require_once("includes/session.php");?>
<?php require_once("includes/functions.php");?>
<?php include("includes/connection.php");?>
<?php

if(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
     
    $checklogin = mysqli_query($connection, "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'");
     
    if(mysqli_num_rows($checklogin) == 1)
    {
        $row = mysqli_fetch_array( $checklogin, MYSQLI_ASSOC);
        $email = $row['email'];
        $userid = $row['userid'];
        $_SESSION['Userid']=$userid;
        $_SESSION['Username'] = $username;
        $_SESSION['EmailAddress'] = $email;
        $_SESSION['LoggedIn'] = 1;
        
        //echo "<h1>Success</h1>";
        //echo "<p>We are now redirecting you to the member area.</p>";
        echo "<meta http-equiv='refresh' content='0 ; url=userhome.php' />";
    }
    else
    {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, your account could not be found. Please <a href=\"homepage.php\">click here to try again</a>.</p>";
    }
}
else
{     redirect_to("homepage.php");

}
    


?>