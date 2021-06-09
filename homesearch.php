<!DOCTYPE html>
<html>
  <head>
	<title>usedbooks</title>
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
	                   <li><a class="active" href="home.php">HOME</a></li>
	                    <li><a href="login.php">LOG IN</a></li>
	                    <li><a href="login.php">SELL</a></li>
	                    <li><a href="aboutus.php">ABOUT US</a></li>
                   </ul>
              </div>
          </div>
          <div >
  	            <form>
  	            	
  		           <div  class="fake-input">
  		                <input  type="text" name="book_search" placeholder="Search for book"  required autofocus="on">
  		                <img src="images/search_logo.png" width=25 />
  		             </div>
                      		        
  		              <input class="button" type="submit" name="search" value="Search">
  		       </form>
                <div class="homeContents">
             <?php
               include ('database_connection.php');
               $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books";
              $display = mysqli_query($conn,$sql);
             // $row = mysqli_num_rows($display);


              while ($result=mysqli_fetch_array($display,MYSQLI_ASSOC)) { ?>
              <div class="homePosts">
                <div>
              <img src="books/<?php echo $result['book_img'];?>" alt="book picture" width="150" height="150">
              <h3><?php echo $result['book_name'];?></h3>
              <p>Writer:<?php echo $result['writer'];?></p>
              <p>Publisher:<?php echo $result['publisher'];?></p>
              <p>ISBN:<?php echo $result['isbn'];?></p>
              <p>Category:<?php echo $result['category'];?></p>
              <p>Price:<?php echo $result['price'];?><b>₹</b></p>
                       
               <button class="button1"><a href="updatebookposts.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } ?>
            </div>
              


                      </div>
                      <div class="footer">
  	                       <p>&copycopyright 2019 UsedBooks.com</p>
                           <a href="feedback.php">Feedback</a> 
                       </div>
      
  </body>
</html>