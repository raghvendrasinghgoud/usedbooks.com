<?php
session_start();
if(!isset($_SESSION['login_user'])){
header("location: login.php");
}  
 include ('database_connection.php');
$message="";
$logname=$_SESSION['login_user'];
if (isset($_POST['submit'])) {
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$email=$_SESSION['useremail'];
 //password validation 

if ($password!=$confirm_password) {
         $message = "Password is not matched<br>";
         
}else{
     
  $sql = "UPDATE users SET password='$password' WHERE email='$email'";
     
if (mysqli_query($conn, $sql)) {
echo"<h1>$password</h1><br>";
    
    header("location: mannageUserAccount.php?message=your password changed successfully:)");
} else {
    echo "<h1>Error updating record: " . mysqli_error($conn)."</h1>";
} 

}
}

?>

<!DOCTYPE html>
<html>
  <head>
	<title>reset account password</title>
  <link rel="icon" href="images/titleimage.ico" />
	<link rel="stylesheet" type="text/css" href="styling.css">
  </head>
  <body>
     
         <div class="header">
                 <a href="home.php"><img title="Go To Home" src="images/logo.png" alt="logo" height="100" width="70"></a>
              <h1>UsedBooks.com</h1>
              <h2>Buy and Sell Used Books</h2>
              <div>
                   <ul>
	                    <li><a href="home.php">HOME</a></li>
	                    <li><a href="login.php"><?php echo $logname; ?></a></li>
	                    <li><a href="login.php">SELL</a></li>
	                    <li><a href="aboutus.html">ABOUT US</a></li>
                   </ul>
              </div>
          </div>
          <div class="loginform">
            
              <h2>Change Password</h2>
  	            
               <form action="" method="POST" autocomplete="off">
                                          <p class="error"><?php echo $message;  ?></p>
  
                 <label>New Password</label>  
                 <input class="userinput" type="text" name="password" required autofocus="on"><br>
                 <label>Confirm Password</label>    
                 <input class="userinput" type="text" name="confirm_password" required><br>              
                  <input class="button1" type="submit" name="submit" value="Submit">
                   </form>
            </div>
                      <div class="footer">
  	                       <p>&copycopyright 2019 UsedBooks.com</p>
                           <a href="feedback.php">Feedback</a> 
                       </div>
      
  </body>
</html>