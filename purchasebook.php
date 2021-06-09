<?php

session_start();
if(!isset($_SESSION['login_user'])){
header("location: login.php");
}  

include ('database_connection.php');
$email=$_SESSION['useremail'];
$book_id=$_GET['book_id'];
$sql="SELECT * FROM books WHERE book_id='$book_id'";
$display=mysqli_query($conn,$sql);
$result=mysqli_fetch_array($display);
$email=$result['email'];
$sql1="SELECT * FROM users WHERE email='$email'";
$display1=mysqli_query($conn,$sql1);
$result1=mysqli_fetch_array($display1);
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
                <div class="sellinfo">
                   <h2>Book Information</h2>
              <img src="books/<?php echo $result['book_img'];?>" alt="book picture" width="150" height="150">
              <h3><?php echo $result['book_name'];?></h3>
              <p>Writer:<?php echo $result['writer'];?></p>
              <p>Publisher:<?php echo $result['publisher'];?></p>
              <p>ISBN:<?php echo $result['isbn'];?></p>
              <p>Category:<?php echo $result['category'];?></p>
              <p>Price:<?php echo $result['price'];?><b>₹</b></p>
                                          
            </div> 
          <div class="sellinfo">
            <h2>Seller Information</h2>
            <label>Name:</label><p><?php echo $result1['fname']." "; ?><?php echo $result1['lname']; ?></p>
            <label>Gender:</label><p><?php echo $result1['gender']." "; ?></p>
            <label>Phone No.:</label><p><?php echo $result1['phoneNo']." "; ?></p>  
            <label>Email:</label><p><?php echo $result1['email']." "; ?></p>
            <label>City:</label><p><?php echo $result1['city']." "; ?></p>
            <label>Area:</label><p><?php echo $result1['area']." "; ?></p>
            <label>Pincode:</label><p><?php echo $result1['pincode']." "; ?></p>
            <label>College/School:</label><p><?php echo $result1['college']." "; ?></p>

          </div>

                      <div class="footer">
  	                       <p>&copycopyright 2019 UsedBooks.com</p>
                           <a href="feedback.php">Feedback</a> 
                       </div>
      
  </body>
</html>
