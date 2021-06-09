<?php

session_start();
if(!isset($_SESSION['login_user'])){
header("location: login.php");
} 
 if(empty($_SESSION['fnameErr'])){
$fnameErr="";
}else{
$fnameErr=$_SESSION['fnameErr'];
}  //first name error msg

if(empty($_SESSION['lnameErr'])){
$lnameErr="";
}else{
$lnameErr=$_SESSION['lnameErr'];
}  //last name error msg

if(empty($_SESSION['phoneNoErr'])){
$phoneNoErr="";
}else{
$phoneNoErr=$_SESSION['phoneNoErr'];
}  //phone number error msg

if(empty($_SESSION['cityErr'])){
$cityErr="";
}else{
$cityErr=$_SESSION['cityErr'];
}  //city error msg

if(empty($_SESSION['areaErr'])){
$areaErr="";
}else{
$areaErr=$_SESSION['areaErr'];
}  //area error msg

if(empty($_SESSION['pincodeErr'])){
$pincodeErr="";
}else{
$pincodeErr=$_SESSION['pincodeErr'];
}  //pincode error msg

if(empty($_SESSION['collegeErr'])){
$collegeErr="";
}else{
$collegeErr=$_SESSION['collegeErr'];
}  //college error msg

$email=$_SESSION['useremail'];

            //                      To change password
            //                              ||
            //                             \  /
            //                              \/
if(isset($_POST['change-password'])){
  
  $rndno=rand(100000, 999999);//OTP generate
$message = urlencode("otp number.".$rndno);
$to=$email;
$subject = "OTP";
$txt = "OTP: ".$rndno."";
$headers = "From: usedbooksforme@gmail.com" . "\r\n" .
"CC: raghavendrasinghgoud@gmail.com";
mail($to,$subject,$txt,$headers);
$_SESSION['otp']=$rndno;
  header("location: submit_otp.php");

}


include ('database_connection.php');

$email=$_SESSION['useremail'];
$query="SELECT * FROM users WHERE email='$email'";
$display=mysqli_query($conn,$query);
$result=mysqli_fetch_array($display);

?>
<!DOCTYPE html>
<html>
  <head>
	<title>login to usedbooks </title>
  <link rel="icon" href="images/titleimage.ico" />
	<link rel="stylesheet" type="text/css" href="styling.css">
  <script type="text/javascript">
    
  </script>
  </head>
  <body>
     
         <div class="header">
              <a href="loginhome.php"><img title="Go To Home" src="images/logo.png" alt="logo" height="100" width="70"></a>
              <h1>UsedBooks.com</h1>
              <h2>Buy and Sell Used Books</h2>
              <div>
                   <ul>
	                    <li><a href="loginhome.php">HOME</a></li>
	                    <li >
                        <div class="dropdown">
                                <button class="dropbtn"><?php echo "Hi ".$_SESSION['login_user'] ;?></button>
                                <div class="dropdown-content">
                                  <a href="userposts.php">Your Posts</a>
                                 <a href="mannageUserAccount.php">Mannage Account</a>
                                     <a href="logout.php">Log Out</a>
                                   </div>
                                 </div></li>
	                    <li><a href="sell.html">SELL</a></li>
	                    <li><a href="aboutus.php">ABOUT US</a></li>
                   </ul>
              </div>
          </div>
          <div class="userinfo">
            
            <h2>Mannage your Information</h2>
            <div>
            <label >First name:</label>
            <p><?php echo $result['fname'];?></p>
             <p class="error"><?php echo $fnameErr;  ?></p>
            <form action="updateUserDetails.php" method="post">
            <input class="editinput" type="text" name="fname" required >
            <input class="edit" type="submit" name="submit-fname" value="Edit">
            </form>
            </div>
            <div>
            <label>Last name:</label>
             <p><?php echo $result['lname']; ?></p>
             <p class="error"><?php echo $lnameErr;  ?></p>
            <form action="updateUserDetails.php" method="post">
            <input class="editinput" type="text" name="lname" required >
            <input class="edit" type="submit" name="submit-lname" value="Edit">
            </form>
            </div>
            <div>
            <label>Mobile Number:</label>
             <p><?php echo $result['phoneNo']; ?></p>
             <p class="error"><?php echo $phoneNoErr;  ?></p>
           <form action="updateUserDetails.php" method="post">
            <input class="editinput" type="text" name="phoneNo" required >
            <input class="edit" type="submit" name="submit-phoneNo" value="Edit">
            </form>
            </div>
            <div>
            <label>City:</label>
             <p><?php echo $result['city']; ?></p>
             <p class="error"><?php echo $cityErr;  ?></p>
           <form action="updateUserDetails.php" method="post">
            <input class="editinput" type="text" name="city" required >
            <input class="edit" type="submit" name="submit-city" value="Edit">
            </form>
            </div>
            <div>
            <label>Area:</label>
            <p><?php echo $result['area'];?></p>
            <p class="error"><?php echo $areaErr;  ?></p>
           <form action="updateUserDetails.php" method="post">
            <input class="editinput" type="text" name="area" required >
            <input class="edit" type="submit" name="submit-area" value="Edit">
            </form>
            </div>
            <div>
            <label>Pincode:</label>
            <p><?php echo $result['pincode']; ?></p>
            <p class="error"><?php echo $pincodeErr;  ?></p>
            <form action="updateUserDetails.php" method="post">
            <input class="editinput" type="text" name="pincode" required >
            <input class="edit" type="submit" name="submit-pincode" value="Edit">
            </form>
            </div>
            <div>
            <label>School/College:</label>
            <p><?php echo $result['college']; ?></p>
            <p class="error"><?php echo $collegeErr;  ?></p>
           <form action="updateUserDetails.php" method="post">
            <input class="editinput" type="text" name="college" required >
            <input class="edit" type="submit" name="submit-college" value="Edit">
            </form>
            </div>
            <form action="" method="POST">
            <input class="button" type="submit" name="change-password" value="Change Password">
          </form>

          </div>

                      <div class="footer">
  	                       <p>&copycopyright 2019 UsedBooks.com</p>
                           <a href="feedback.php">Feedback</a> 
                       </div>
      
  </body>
</html>
  