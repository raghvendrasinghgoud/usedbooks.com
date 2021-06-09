<?php
session_start();
$message="<p class='error'>Sucessfully send OTP to your mail.</p>";
  $logname="";
if(isset($_SESSION['login_user'])){
   $logname=$_SESSION['login_user'];
    if(isset($_POST['submit']))
{

$rno=$_SESSION['otp'];
$urno=$_POST['otp'];                                      //signup data storing code
if(!strcmp($rno,$urno))
{  
  
   header("location: changeuserpassword.php");
}
}
else{
$message="<p class='error'>Invalid OTP.</p>";
}
}
//resend OTP
if(isset($_POST['resend']))
{

$rno=$_SESSION['otp'];
$to=$_SESSION['email'];
$subject = "OTP";
$txt = "OTP: ".$rno."";
$headers = "From: usedbooksforme@gmail.com" . "\r\n" .
"CC: raghavendrasinghgoud@gmail.com";
mail($to,$subject,$txt,$headers);
$message="<p class='error'>Sucessfully resend OTP to your mail.</p>";
}
  //change password
else{
 $logname="LOG IN";
}
if(isset($_POST['submit']))
{
 
$rno=$_SESSION['otp'];
$urno=$_POST['otp'];                                      //signup data storing code
if(!strcmp($rno,$urno))
{  if(!isset($_SESSION['login_user'])){

  include ('database_connection.php');

$fname=$_SESSION['fname'];
$lname=$_SESSION['lname'];
$gender=$_SESSION['gender'];
$phoneNo=$_SESSION['phoneNo'];
$email=$_SESSION['email'];
$password=$_SESSION['password'];
$city=$_SESSION['city'];
$area=$_SESSION['area'];
$pincode=$_SESSION['pincode'];
$college=$_SESSION['college'];

$sql="INSERT INTO users(fname,lname,gender,phoneNo,email,password,city,area,pincode,college)
            VALUES('$fname','$lname','$gender','$phoneNo','$email','$password','$city','$area','$pincode','$college')";
            if(mysqli_query($conn,$sql)){
              header("Location: login.php?message=Thank you for register. Please login to continue.");
            }
}
}
else{
$message="<p class='error'>Invalid OTP.</p>";
}
}
//resend OTP
if(isset($_POST['resend']))
{

$rno=$_SESSION['otp'];
$to=$_SESSION['email'];
$subject = "OTP";
$txt = "OTP: ".$rno."";
$headers = "From: usedbooksforme@gmail.com" . "\r\n" .
"CC: raghavendrasinghgoud@gmail.com";
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
	                    <li><a href="login.php"><?php echo $logname; ?></a></li>
	                    <li><a href="login.php">SELL</a></li>
	                    <li><a href="aboutus.php">ABOUT US</a></li>
                   </ul>
              </div>
          </div>
          <div class="loginform">
            
              <h2>Verification</h2>
  	            
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