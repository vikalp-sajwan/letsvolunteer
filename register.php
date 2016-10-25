<?php require_once("includes/session.php");?>
<?php include("includes/connection.php");?>
<?php include("includes/templates/header.php");?>
<?php include("includes/templates/aside.php");?>

<?php
if(!empty($_POST['username']) && !empty($_POST['password']))
{
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $gender = mysqli_real_escape_string($connection,$_POST['gender']);
    $birthdate = mysqli_real_escape_string($connection,$_POST['birthdate']);
    $contact = mysqli_real_escape_string($connection,$_POST['contact']);
    $address = mysqli_real_escape_string($connection,$_POST['address']);
    $district = mysqli_real_escape_string($connection,$_POST['district']);
    $state = mysqli_real_escape_string($connection,$_POST['state']);
    
    
     $checkusername = mysqli_query($connection,"SELECT * FROM users WHERE username = '".$username."'");
     $checkemail = mysqli_query($connection,"SELECT * FROM users WHERE email = '".$email."'"); 
     if(mysqli_num_rows($checkusername) == 1 )
     {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
     }
     else if(mysqli_num_rows($checkemail) == 1 )
     {
        echo "<h1>Error</h1>";
        echo "<p>Sorry, that email is already registered. Please go back and try again.</p>";
     }
     else
     {
        $registerquery = mysqli_query($connection,"INSERT INTO users (username, password, email, gender, birthdate, contact, address, district, state) 
        VALUES('".$username."', '".$password."', '".$email."', '".$gender."' , '".$birthdate."', '".$contact."' , '".$address."', '".$district."', '".$state."')");
        if($registerquery)
        {
            echo "<h1>Success</h1>";
            echo "<p>Your account was successfully created. Please <a href=\"index.php\">click here to login</a>.</p>";
        }
        else
        {
            echo "<h1>Error</h1>";
            echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
        }       
     }
}
else
{
?>
   <article>  
   <h1>Register</h1>
     
   <p>Please enter your details below to register.</p>
     
    
       <form method="post" action="register.php" name="registerform" id="registerform">
    
        <table>
        <tr>
            <td><label for="username">Name:</label></td>
            <td><input type="text" name="username" id="username " placeholder="Enter your name" autofocus required/></td>
        </tr>
        
        <tr>
            <td><label for="password">Password:      </label></td>
            <td><input type="password" name="password" id="password" required/></td>
        </tr>
        <tr>
            <td><label for="email">Email Address:</label></td>
            <td><input type="email" name="email" id="email" placeholder="Enter your Email" required/></td>
        </tr>
        <tr>
            <td><label for="gender">Gender:</label></td>
            <td><select  name="gender" id="gender"/>            
                <option>Select a Gender</option>
                <option>male</option>
                <option>female</option>
            
        </select>
            </td>
        </tr>
        <tr>
            <td><label for="birthdate">Birthdate:</label></td>
            <td><input type="date" name="birthdate"/></td>
        </tr>
        <tr>
            <td><label for="address">Address:</label></td>
            <td><input type="text" name="address" id="address" /></td>
        </tr>
       <tr>
            <td><label for="contact">Contact:</label></td>
            <td><input type="text" name="contact" id="contact " placeholder="Enter your contact number"/></td>
        </tr>
        
        <tr>
            <td><label for="district">District:</label></td>
            <td><input type="text" name="district" id="district" /></td>
        </tr>    
        <tr>
            <td><label for="state">State:</label></td>
            <td><input type="text" name="state" id="state" /></td>
        </tr>    


        <tr>
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