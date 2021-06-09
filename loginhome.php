<?php

session_start();
if(!isset($_SESSION['login_user'])){
header("location: login.php");
}

 include ('database_connection.php');

 $email=$_SESSION['useremail'];
?>

<!DOCTYPE html>
<html>
  <head>
  <title>usedbooks</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/titleimage.ico" />
  <link rel="stylesheet" type="text/css" href="styling.css">
  <link rel="stylesheet" type="text/css" href="responsive.css">
  </head>
  <body>
    
         <div class="header">
              <a href="loginhome.php"><img title="Go To Home" src="images/logo.png" alt="logo" height="100" width="70"></a>
              <h1>UsedBooks.com</h1>
              <h2>Buy and Sell Used Books</h2>
              <div>
                   <ul>
                     <li><a class="active" href="loginhome.php">HOME</a></li>
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
          <div >
            <div class="categories">
                       
               <ul>
              <li><form action="" method="POST"><input type="submit" name="recommended" value="Recommended"></form></li>
              <li><form action="" method="POST"><input type="submit" name="art" value="Art & Music"></form></li>
              <li><form action="" method="POST"><input type="submit" name="biographies" value="Biographies"></form></li>
              <li><form action="" method="POST"><input type="submit" name="buisness" value="Business"></form></li>
              <li><form action="" method="POST"><input type="submit" name="kids" value="Kids"></form></li>
              <li><form action="" method="POST"><input type="submit" name="comics" value="Comics"></li>
              <li><form action="" method="POST"><input type="submit" name="computer" value="Computers & Tech"></form></li>
              <li><form action="" method="POST"><input type="submit" name="cooking" value="Cooking"></form></li>
              <li><form action="" method="POST"><input type="submit" name="hobies" value="Hobies & Craft"></form></li>
              <li><form action="" method="POST"><input type="submit" name="education" value="Education & Reference"></form></li>
              <li><form action="" method="POST"><input type="submit" name="health" value="Health & Fitness"></form></li>
              <li><form action="" method="POST"><input type="submit" name="history" value="History"></form></li>
              <li><form action="" method="POST"><input type="submit" name="home" value="Home & Garden"></li> 
              <li><form action="" method="POST"><input type="submit" name="horror" value="Horror"></form></li>
              <li><form action="" method="POST"><input type="submit" name="entertainment" value="Entertainment"></form></li>
              <li><form action="" method="POST"><input type="submit" name="literature" value="Literature & Fiction"></form></li>
              <li><form action="" method="POST"><input type="submit" name="medical" value="Medical"></form></li>
              <li><form action="" method="POST"><input type="submit" name="mysteries" value="Mysteries"></form></li>
              <li><form action="" method="POST"><input type="submit" name="parenting" value="Parenting"></form></li>
              <li><form action="" method="POST"><input type="submit" name="social " value="Social Sciences"></form></li>
              <li><form action="" method="POST"><input type="submit" name="religious" value="Religion"></form></li>
              <li><form action="" method="POST"><input type="submit" name="romance" value="Romance"></form></li>
              <li><form action="" method="POST"><input type="submit" name="science" value="Science & Math"></form></li>
              <li><form action="" method="POST"><input type="submit" name="sports" value="Sports"></form></li>
              <li><form action="" method="POST"><input type="submit" name="travel" value="Travel"></form></li>
              <li><form action="" method="POST"><input type="submit" name="magazine" value="Magzine"></form></li>
              <li><form action="" method="POST"><input type="submit" name="qb" value="Question Bank"></form></li>
                     
                   </ul>
          </div>
               <div class="contentSearch">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                 <div  class="fake-input">
                      <input  type="text" name="book_search" placeholder="Search for book"  required autofocus="on">
                      <img src="images/search_logo.png" width=25 />
                   </div>
                                  
                    <input class="button" type="submit" name="submit-search" value="Search">
             </form>
           </div>
                <div class="homeContents">
             <?php 
               
               if((isset($_POST['submit-search'])) || (isset($_POST['recommended'])) || (isset($_POST['art'])) || (isset($_POST['biographies'])) || (isset($_POST['buisness'])) || (isset($_POST['kids'])) || (isset($_POST['comics'])) || (isset($_POST['computer'])) || (isset($_POST['cooking'])) || (isset($_POST['hobies'])) || (isset($_POST['education'])) || (isset($_POST['health'])) || (isset($_POST['history'])) || (isset($_POST['home'])) || (isset($_POST['horror'])) || (isset($_POST['entertainment'])) || (isset($_POST['literature'])) || (isset($_POST['medical'])) || (isset($_POST['mysteries'])) || (isset($_POST['parenting'])) || (isset($_POST['social'])) || (isset($_POST['religion'])) || (isset($_POST['romance'])) || (isset($_POST['science'])) || (isset($_POST['sports'])) || (isset($_POST['travel'])) || (isset($_POST['magazine'])) || (isset($_POST['qb']))){

                    if(isset($_POST['submit-search'])){
                    $book_search=$_POST['book_search'];
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE book_name LIKE '$book_search%'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
                <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }
                  //recommmended search
                 if(isset($_POST['recommended'])){
                    
                      $query="SELECT pincode,college FROM users WHERE email='$email'";
                      $displaypin=mysqli_query($conn,$query);
                      $getpin=mysqli_fetch_array($displaypin);     
                      $takepin=$getpin['pincode'];
                     $sql = "SELECT email FROM users WHERE pincode='$takepin'";
                  $displayemail = mysqli_query($conn,$sql);

           
              while ($emailresult=mysqli_fetch_array($displayemail,MYSQLI_ASSOC)) {
                    $userresult=$emailresult['email'];
                    $newquery="SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE email='$userresult'";
                    $newdisplay=mysqli_query($conn,$newquery);
                    while ($result=mysqli_fetch_array($newdisplay)) {
               ?>
              <div class="homePosts">
                <div>
              <img src="books/<?php echo $result['book_img'];?>" alt="book picture" width="150" height="150">
              <h3><?php echo $result['book_name'];?></h3>
              <p>Writer:<?php echo $result['writer'];?></p>
              <p>Publisher:<?php echo $result['publisher'];?></p>
              <p>ISBN:<?php echo $result['isbn'];?></p>
              <p>Category:<?php echo $result['category'];?></p>
              <p>Price:<?php echo $result['price'];?><b>₹</b></p>
                       
                <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>
                     </div>                   
            </div> 
              
            <?php
             } 
           }
         }   
                //Art and Music 
                if(isset($_POST['art'])){
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Art & Music'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
               <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Biographies
         if(isset($_POST['biographies'])){
                   
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Biographies'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
               <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

            //Buisness

            if(isset($_POST['buisness'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Business'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
                <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }


         //Kids

         if(isset($_POST['kids'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Kids'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
                <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //comics

         
         if(isset($_POST['comics'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Comics'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
              <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //computers and tech

         if(isset($_POST['computer'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Computers & Tech'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
               <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //coocking

         if(isset($_POST['cooking'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Cooking'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
                <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Hobies and Craft

         if(isset($_POST['hobies'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Hobies & Craft'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
               <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Education and reference

         if(isset($_POST['education'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Education & Reference'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
                <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Health and fitness

         if(isset($_POST['health'])){
                   
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Health & Fitness'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
                <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //History

         if(isset($_POST['history'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='History'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
                <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         

         //Home and Garden

         if(isset($_POST['home'])){
                  
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Home & Garden'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
               <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>
                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Horror

         if(isset($_POST['horror'])){
                   
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Horror'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
              <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Entertainment

         if(isset($_POST['entertainment'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Entertainment'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
           <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Literature and fiction

         if(isset($_POST['literature'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Literature & Fiction'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
            <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Medical

         if(isset($_POST['medical'])){
                   
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Medical'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
           <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Mysteries

         if(isset($_POST['mysteries'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Mysteries'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
           <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Parenting

         if(isset($_POST['parenting'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Parenting'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
        <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Social Sciences

         if(isset($_POST['social'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Social Sciences'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
          <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Religion

         if(isset($_POST['religion'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Religion'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
            <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>
                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Romance

         if(isset($_POST['romance'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Romance'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
       <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>
                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Science and Maths

         if(isset($_POST['science'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Science & Math'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
         <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Sports

         if(isset($_POST['sports'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Sports'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
   <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Travel

         if(isset($_POST['travel'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Travel'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
         <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Magazine

         if(isset($_POST['magzine'])){
                 
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Magzine'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
           <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }

         //Question Bank

         if(isset($_POST['qb'])){
                    
                     $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books WHERE category='Question Bank'";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                if($row>=1){
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
                       
         <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
             } 
           }else{
           echo "<h1>No result found</h1>";
         }  }
              

              }else{  
                     //another code
               $sql = "SELECT book_id,book_name,book_img,writer,publisher,isbn,category,price FROM books";
              $display = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($display);

                 
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
                       
          <button class="button1"><a href="purchasebook.php?book_id=<?php echo $result['book_id'] ;?>&book_img=<?php echo $result['book_img'];?>">Buy </a></button>

                     </div>                   
            </div> 
              
            <?php
          }

             }
             ?>
            </div>
              


                      </div>
                      <div class="footer">
                           <p>&copycopyright 2019 UsedBooks.com</p>
                        <a href="feedback.php">Feedback</a>   
                       </div>
      
  </body>
</html>