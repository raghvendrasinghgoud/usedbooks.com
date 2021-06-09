<?php
session_start();
 include ('database_connection.php');

 $message="";
 if(isset($_POST['submit-email'])){
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];


//password validation 

if ($password!=$confirm_password) {
         $message = "Password is not matched<br>";
         $error="do not submit";
}else{
  $sql="SELECT email FROM users WHERE email='$email'";
$emailinfo=mysqli_query($conn,$sql);
$result=mysqli_fetch_array($emailinfo);
if($result){
   session_start();
$rndno=rand(100000, 999999);//OTP generate
$message = urlencode("otp number.".$rndno);
$to=$email;
$subject = "OTP";
$txt = "OTP: ".$rndno."";
$headers = "From: usedbooksforme@gmail.com" . "\r\n" .
"CC: raghavendrasinghgoud@gmail.com";
mail($to,$subject,$txt,$headers);
$_SESSION['email']=$email;
$_SESSION['otp']=$rndno;
$_SESSION['password']=$password;
  header("location: changepassword.php");
 }else{
  $message="Email Not Found";
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
	                    <li><a href="login.php">LOG IN</a></li>
	                    <li><a href="login.php">SELL</a></li>
	                    <li><a href="aboutus.php">ABOUT US</a></li>
                   </ul>
              </div>
          </div>
          <div class="loginform">
            
              <h2>Recover Password</h2>
  	            
               <form action="" method="POST" autocomplete="off">
                                          <p class="error"><?php echo $message;  ?></p>

                <br><br><br><br><label>Enter Email Address</label>
                 <input class="userinput" type="text" name="email" required><br>  
                 <label>New Password</label>  
                 <input class="userinput" type="text" name="password" required autofocus="on"><br>
                 <label>Confirm Password</label>    
                 <input class="userinput" type="text" name="confirm_password" required><br>              
                  <input class="button1" type="submit" name="submit-email" value="Submit">
                   </form>
            </div>
                      <div class="footer">
  	                       <p>&copycopyright 2019 UsedBooks.com</p>
                           <a href="feedback.php">Feedback</a> 
                       </div>
      
  </body>
</html>