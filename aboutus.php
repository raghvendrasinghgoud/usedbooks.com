<?php

session_start();


if(isset($_SESSION['login_user'])){
  $sell='sell.php';
  $home='loginhome.php';
}else{
  $sell='login.php';
  $home='home.php';
}

?>
<!DOCTYPE html>
<html>
  <head>
	<title>about usedbooks.com</title>
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
	                   <li><a href='<?php echo $home; ?>'>HOME</a></li>
                     <?php if(isset($_SESSION['login_user'])){  ?>
                      <li >
                        <div class="dropdown">
                                <button class="dropbtn"><?php echo "Hi ".$_SESSION['login_user'] ;?></button>
                                <div class="dropdown-content">
                                  <a href="userposts.php">Your Posts</a>
                                 <a href="mannageUserAccount.php">Mannage Account</a>
                                     <a href="logout.php">Log Out</a>
                                   </div>
                                 </div></li><?php }else{ ?>
	                    <li><a href="login.php">LOG IN</a></li>
                      <?php } ?>
	                    <li><a href='<?php echo $sell; ?>'>SELL</a></li>
	                    <li><a class="active" href="aboutus.php">ABOUT US</a></li>
                   </ul>
              </div>
          </div>
            <div class="purpose">
                <h1>Purpose Of our Project</h1>
                <p>The purpose of our project is to save time and money of students on purchasing books.</p>
            </div>
            <div class="whatis">
              <h1>What is usedBooks.com?</h1>
              <p>UsedBooks.com is a platform where you can buy old books and sell your used books.It is fullfill your need in a smart way.It is revolutionizing the way of students purchasing books.</p>
            </div>
            <div class="recycle">
              <h1>A recycling concept</h1>
              <p>UsedBooks.com recycles learning source.</p>
            </div>
            <div class="saving">
              <h1 >Saving</h1>
              <p>usedbooks.com saves time ,money,papers,tree and nature. <br>
                <b>Let us see how ??</b><br>
              New books = papers = trees = nature = earth <img src="images/smiley.png" width="30" height="30"><br>
                </p>
            </div>
          <div class="footer">
  	        <p>&copycopyright 2019 UsedBooks.com</p>
            <a href="feedback.php">Feedback</a> 
           </div>
      
  </body>
</html>