<?php

session_start();
if(!isset($_SESSION['login_user'])){
header("location: login.php");
}  
 include ('database_connection.php');
                
              $book_id=$_GET['book_id'];
               $sql = "DELETE FROM books WHERE book_id='$book_id'";
              mysqli_query($conn,$sql);
      
       $filename=$_GET['book_img'];
     $path="books/".$filename;
if(unlink($path)) echo "Deleted file ";

header("location:userposts.php");

?>