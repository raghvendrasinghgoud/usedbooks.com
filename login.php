<?php

include ('database_connection.php');   //connect to database

session_start();
   $error="";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      if(isset($_POST['submit'])){
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT email,fname FROM users WHERE email = '$myusername' AND password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['fname'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         echo "Login successfull";
         $_SESSION['login_user'] = $active;
         $_SESSION['useremail']=$myusername;
         
         header("location: loginhome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
}
?>


<html>
  <head>
	<title>login to usedbooks </title>
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
	                    <li><a class="active" href="login.php">LOG IN</a></li>
	                    <li><a href="login.php">SELL</a></li>
	                    <li><a href="aboutus.php">ABOUT US</a></li>
                   </ul>
              </div>
          </div>
          <div class="loginform">
            
              <h2>LogIn To UsedBooks.com</h2>

              <?php echo "<p class=\"error\">".$error."<p>"; ?>
  	            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" autocomplete="off">
                 <label for="userphone"> Enter Email</label>
                 <input class="userinput" type="text" name="username" required autofocus="on"><br>
                 
                 <label for="password">Password</label>
                 <input class="userinput" type="password" name="password" required><br>
                
                <input class="button1" type="submit" name="submit" value="LOGIN">
              </form>
              <form action="signup_entries.php">
              <input class="button2" type="submit" value="SIGNUP">
               </form>
              <a href="resetpassword.php">Forgot Password?</a>
            </div>
                      <div class="footer">
  	                       <p>&copycopyright 2019 UsedBooks.com</p>
                           <a href="feedback.php">Feedback</a> 
                       </div>
      
  </body>
</html>
