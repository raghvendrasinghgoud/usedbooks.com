<?php
session_start();
$message="<p class='error'>Sucessfully send OTP to your mail.</p>";
if(isset($_POST['submit']))
{

$rno=$_SESSION['otp'];
$urno=$_POST['otp'];

if(!strcmp($rno,$urno))
{
  include ('database_connection.php');
if (!empty($_POST['submit'])) {
  $email=$_SESSION['email'];
$password=$_SESSION['password'];
  $sql = "UPDATE users SET password='$password' WHERE email='$email'";

if (mysqli_query($conn, $sql)) {
    echo "<h1>Record updated successfully</h1>";
    header("location: mannageUserAccount.php");
} else {
    echo "<h1>Error updating record: " . mysqli_error($conn)."</h1>";
}  
}        }

}
else{
$message="<p class='error'>Invalid OTP.</p>";
}

//resend OTP
if(isset($_POST['resend']))
{

$rno=$_SESSION['otp'];
$to=$_SESSION['email'];
$subject = "OTP";
$txt = "OTP: ".$rno."";
$headers = "From: otp@studentstutorial.com" . "\r\n" .
"CC: divyasundarsahu@gmail.com";
mail($to,$subject,$txt,$headers);
$message="<p class='error'>Sucessfully resend OTP to your mail.</p>";
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
                      <li><a href="login.php">LOG IN</a></li>
                      <li><a href="login.php">SELL</a></li>
                      <li><a href="aboutus.php">ABOUT US</a></li>
                   </ul>
              </div>
          </div>
          <div class="loginform">
            
              <h2>Change Password</h2>
                
               <form action="" method="POST" autocomplete="off">
                                          <?php echo $message;  ?>

                <br><br><br><br><label for="otp">Enter One Time Password (OTP)</label>
                 <input class="userinput" type="text" name="otp" required autofocus="on"><br>              
                  <input class="button1" type="submit" name="submit" value="Submit">
                   </form>
                  <form action="" method="POST">
                  <input class="button2" type="submit" name="resend" value="Resend OTP">
                </form>
            </div>
                      <div class="footer">
                           <p>&copycopyright 2019 UsedBooks.com</p>
                           <a href="feedback.php">Feedback</a> 
                       </div>
      
  </body>
</html>