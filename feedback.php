<?php  
session_start();
if(!isset($_SESSION['login_user'])){
header("location: login.php");
}   

 include ('database_connection.php');
 $name=$_SESSION['login_user'];
 if(isset($_POST['submit'])){
 $rating=$_POST['rating'];
 $message=$_POST['opinion'];
 $sql="INSERT INTO feedback(name,rating,message)VALUES('$name','$rating','$message')";
 if(mysqli_query($conn,$sql)){
              header("location: feedback.php");
            } else{
                    echo "<h1>query Not inserted succesfully</h1>";
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
	                    <li><a href="sell.php">SELL</a></li>
	                    <li><a href="aboutus.php">ABOUT US</a></li>
                   </ul>
              </div>
          </div>
          <div class="loginform">
            <h2>Feedback</h2>    
           <form action="" method="POST">
             <label for="rating">Rate Us</label>
           <select class="userinput" type="" name="rating" required>
                 <option value="Poor">Poor</option>
                 <option value="Good" selected>Good</option>
                 <option value="Very Good">Very Good</option>
                 <option value="Excelent">Excelent</option>
                 <option value="Outstanding">Outstanding</option>
               </select>
               <label for="Opinion">Your Opinion</label>
               <textarea  name="opinion" placeholder="Write something.." style="height:200px;width: 350px;padding: 10px;"></textarea>
               <input class="button1" type="submit" name="submit" value="Submit">

           </form>


          </div>

          <div class="feedback">
            <?php
           $query="SELECT * FROM feedback";
           $display=mysqli_query($conn,$query);
           while($result=mysqli_fetch_array($display)){
           ?>
           <div >
             <h3><?php echo $result['name'] ?></h3>
             <h4><?php echo $result['rating'] ?></h4>
             <p><?php echo $result['message'] ?></p>
           </div>
          <?php  } ?>
          </div>


                      <div class="footer">
  	                       <p>&copycopyright 2019 UsedBooks.com</p>
                           <a href="feedback.php">Feedback</a> 
                       </div>
      
  </body>
</html>