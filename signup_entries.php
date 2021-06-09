<?php

include ('database_connection.php');
  // process the form contents...
$fnameErr = $lnameErr = $genderErr = $phoneNoErr = $emailErr = $passwordErr = $cityErr = $areaErr = $pincodeErr = $collegeErr = $error= "";

//retrieve data from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 



if(isset($_POST['submit'])){
                       
$fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $gender=$_POST['gender'];
 $phoneNo=$_POST['phoneNo'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 $confirm_password=$_POST['confirm_password'];
 $city=$_POST['city'];
 $area=$_POST['area'];    
 $pincode=$_POST['pincode'];
 $college=$_POST['college'];

                                //check phone is already registered
  $duplicate=mysqli_query($conn,"select * from users where phoneNo='$phoneNo'");
if (mysqli_num_rows($duplicate)>0)
{
       $phoneNoErr="Phone number is already registered";
     
}
                                      //check email is already registered
 $duplicate=mysqli_query($conn,"select * from users where email='$email'");
if (mysqli_num_rows($duplicate)>0)
{
       $emailErr="Email is already registered";
     
}

if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {           //first name validation
      $fnameErr = "Only letters and white space allowed"; 
      $error="do not submit";
}
  
                                                       //last name validation
if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
       $lnameErr = "Only letters and white space allowed"; 
       $error="do not submit";
}

    //gender validation
    if (empty($gender)) {
        $genderErr = "Gender is required";
        $error="do not submit";
  } 


             //Phone Number validation
if(!empty($phoneNo)) // phone number is not empty
{
    if(!preg_match('/^[0-9]{10}+$/',$phoneNo)) // phone number is valid
    {      
          
          $phoneNoErr="phone number invalid !";
          $error="do not submit";
         
    }
}
else // phone number is empty
{  echo $phoneNo."<br>";
      $phoneNoErr= "required field";
      $error="do not submit";
}
     

     //Email validation

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr= "Invalid email format"; 
}
   //password validation 

if ($password!=$confirm_password) {
         $passwordErr = "Password is not matched<br>";
         $error="do not submit";
}

    //pincode validation 

if(!empty($pincode)) // Pincode number is not empty
{
    if(!preg_match('/^\d{6}$/',$pincode)) // Pincode number is valid
    {
       $pincodeErr ="pincode is not invalid !";
       $error="do not submit";
    }
    
}
else //Pincode number is empty
{
        $pincodeErr="You must provide a pincode !";
        $error="do not submit";
}

if (!preg_match("/^[a-zA-Z ]*$/",$city)) {           //first name validation
      $cityErr = "Only letters and white space allowed";
      $error="do not submit"; 
}

if (!preg_match("/^[a-zA-Z ]*$/",$area)) {           //first name validation
      $areaErr = "Only letters and white space allowed"; 
      $error="do not submit";
}

if (!preg_match("/^[a-z ]*$/",$college)) {           //first name validation
       $collegeErr = "Only small letters and white space allowed";
       $error="do not submit"; 
}

}
}
?>
<html>
  <head>
  <title>signup to usedbooks</title>
  <link rel="icon" href="images/titleimage.ico" />
  <link rel="stylesheet" type="text/css" href="styling.css">
  </head>
  <body>
     
         <div class="header">
                <a href="home.html"><img title="Go To Home" src="images/logo.png" alt="logo" height="100" width="70"></a>
              <h1>UsedBooks.com</h1>
              <h2>Buy and Sell Used Books</h2>
              <div>
                   <ul>
                      <li><a href="home.html">HOME</a></li>
                      <li><a href="login.php">LOG IN</a></li>
                      <li><a href="sell.html">SELL</a></li>
                      <li><a href="aboutus.php">ABOUT US</a></li>
                   </ul>
              </div>
          </div>
          <div class="register">
            
              <h2>SignUp To UsedBooks.com</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
                                
                 <label for="fname">First Name</label>
                    <?php echo "<p class=\"error\">".$fnameErr."<p>"; ?> 
                 <input class="userinput" type="text" name="fname" required><br>
                 
                 <label for="lname">Last Name</label>
                 <?php echo "<p class=\"error\">".$lnameErr."<p>"; ?> 
                 <input class="userinput" type="text" name="lname" required><br>
                 
                 <label>Gender:</label>
                 <?php echo "<p class=\"error\">".$genderErr."<p>"; ?> 
                 <input type="radio" name="gender" value="Male" checked>
                 <label>Male</label>

                 <input type="radio" name="gender" value="Female" >
                 <label>Female</label><br>   
                
                 <label for="phoneNo">Mobile No.</label>
                 <?php echo "<p class=\"error\">".$phoneNoErr."<p>"; ?> 
                 <input class="userinput" type="text" name="phoneNo" required><br>
                 
                 <label for="email">Email</label>
                 <?php echo "<p class=\"error\">".$emailErr."<p>"; ?>  
                 <input class="userinput" type="text" name="email" required><br>

                 <label for="password">Password</label>
                 <?php echo "<p class=\"error\">".$passwordErr."<p>"; ?> 
                 <input class="userinput" type="password" name="password" required><br>
                
                <label for="confirm_password">Confirm Password</label>
                 <input class="userinput" type="password" name="confirm_password" required><br>
                 
                 <label for="city">City</label>
                 <?php echo "<p class=\"error\">".$cityErr."<p>"; ?> 
                 <input class="userinput" type="text" name="city" required><br>
                 
                 <label for="area">Area</label>
                 <?php echo "<p class=\"error\">".$areaErr."<p>"; ?> 
                 <input class="userinput" type="text" name="area" required><br>

                 <label for="pincode">Pincode</label>
                 <?php echo "<p class=\"error\">".$pincodeErr."<p>"; ?> 
                 <input class="userinput" type="number" name="pincode" required><br>
                 
                 <label for="college">College/school</label>
                 <?php echo "<p class=\"error\">".$collegeErr."<p>"; ?> 
                 <input class="userinput" type="text" name="college" ><br>

                <input class="button2" type="submit" name="submit" value="SIGNUP">
              </form>
              
            </div>
                      <div class="footer">
                           <p>&copycopyright 2019 UsedBooks.com</p>
                           <a href="feedback.php">Feedback</a> 
                       </div>
      </body>
</html>
      <?php

      if(isset($_POST['submit'])){
       if($error!="do not submit"){
        
        session_start();
$rndno=rand(100000, 999999);//OTP generate
$message = urlencode("otp number.".$rndno);
$to=$email;
$subject = "OTP";
$txt = "OTP: ".$rndno."";
$headers = "From: usedbooksforme@gmail.com" . "\r\n" .
"CC: raghavendrasinghgoud@gmail.com";
mail($to,$subject,$txt,$headers);
if(isset($_POST['submit']))
{
$_SESSION['fname']=$fname;
$_SESSION['lname']=$lname;
$_SESSION['gender']=$gender;
$_SESSION['phoneNo']=$phoneNo;
$_SESSION['email']=$email;
$_SESSION['password']=$password;
$_SESSION['city']=$city;
$_SESSION['area']=$area;
$_SESSION['pincode']=$pincode;
$_SESSION['college']=$college;
$_SESSION['otp']=$rndno;
header( "Location: submit_otp.php" ); 
} 
/*

     $sql="INSERT INTO users(fname,lname,gender,phoneNo,email,password,city,area,pincode,college)
            VALUES('$fname','$lname','$gender','$phoneNo','$email','$password','$city','$area','$pincode','$college')";
            if(mysqli_query($conn,$sql)){
              header("Location: login.php?message=Thank you for register. Please login to continue.");
            }            
            */
}
}
?>
  