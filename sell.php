<?php

session_start();
if(!isset($_SESSION['login_user'])){
header("location: login.php");
}

include ('database_connection.php');
$fileErr="";
$uploadOk=1;
if($_SERVER["REQUEST_METHOD"] == "POST") {
      //Book details sent by the user
      if(isset($_POST['submit'])){
  
   $target_dir = "books/";
$target_file = $target_dir . basename($_FILES["book_image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if file already exists
if (file_exists($target_file)) {
    $fileErr= "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["book_image"]["size"] > 500000) {
    $fileErr="Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   $fileErr="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
} 
// Check if $uploadOk is set to 0 by an error
if ($uploadOk != 0) {
    $fileErr="Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (  move_uploaded_file($_FILES["book_image"]["tmp_name"], $target_file)  ) {
       $fileErr="The file ". basename( $_FILES["book_image"]["name"]). " has been uploaded.";

         $bookname=$_POST['bookname'];
         $writer=$_POST['writer'];
         $publisher=$_POST['publisher'];
         $isbnno=$_POST['isbnno'];
         $category=$_POST['category'];
         $price=$_POST['price'];
          $filename=$_FILES["book_image"]["name"];
            $email=$_SESSION["useremail"];
         $sql="INSERT INTO books(book_name,book_img,writer,publisher,isbn,category,price,email)
         VALUES('$bookname','$filename','$writer','$publisher','$isbnno','$category','$price','$email')";

         if(mysqli_query($conn,$sql)){
        header("location: userposts.php");
       }else{
           echo "<h1>query not inserted</h1>";
     }

    } else {
       $fileErr="Sorry, there was an error uploading your file.";
    }
}

}
}
?>

<!DOCTYPE html>
<html>
  <head>
	<title>sell your books</title>
  <link rel="icon" href="images/titleimage.ico" />
	<link rel="stylesheet" type="text/css" href="styling.css">
  <script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>
  </head>
  <body>
     
         <div class="header">
              <a href="loginhome.php"><img title="Go To Home" src="images/logo.png" alt="logo" height="100" width="70"></a>
              <h1>UsedBooks.com</h1>
              <h2>Buy and Sell Used Books</h2>
              <div>
                   <ul>
                     <li><a  href="loginhome.php">HOME</a></li>
                      <li >
                        <div class="dropdown">
                                <button class="dropbtn"><?php echo "Hi ".$_SESSION['login_user'] ;?></button>
                                <div class="dropdown-content">
                                  <a href="userposts.php">Your Posts</a>
                                 <a href="mannageUserAccount.php">Mannage Account</a>
                                     <a href="logout.php">Log Out</a>
                                   </div>
                                 </div></li>
                      <li><a class="active" href="sell.php">SELL</a></li>
                      <li><a href="aboutus.php">ABOUT US</a></li>
                   </ul>
              </div>
          </div>
          <div class="post_book_form">
            
              <h2>Post your Book for sell</h2>

              <?php echo "<br><p class=\"error\">".$fileErr."<p><br>"; ?>

  	            <form action="" method="post" enctype="multipart/form-data">
                  <div class="selectimage" id="imagePreview" style="background-image: url(images/upload_pic.png);">
                    
                  <input class="book_image"  onchange="preview_image(event)" title="Choose Book Image" type="file" accept=".png, .jpg, .jpeg" name="book_image" required>
                  <img class="preview_pic" id="output_image"/>
                 </div>
                 <div class="sell_inputs">
                 <label for="bookname">Name of Book</label>
                 <input class="userinput" type="text" name="bookname" required><br>
                 
                 <label for="writer">Name of writer</label>
                 <input class="userinput" type="text" name="writer" required><br>

                 <label for="publisher">Publisher</label>
                 <input class="userinput" type="text" name="publisher" required><br>
                 
                 <label for="isbn_no">ISBN no.</label>
                 <input class="userinput" type="text" name="isbnno" ><br>
                  
                 <label for="category">Category</label>
                 <select class="userinput" type="" name="category" required>
                 <option value="Art & Music">Art & Music</option>
                 <option value="Biographies">Biographies</option>
                 <option value="Business">Business</option>
                 <option value="Kids">Kids</option>
                 <option value="Comics">Comics</option>
                 <option value="Computers & Tech">Computers & Tech</option>
                 <option value="Cooking">Cooking</option>
                 <option value="Hobies & Craft">Hobies & Craft</option>
                 <option value="Education & Reference" selected>Education & Reference</option>
                 <option value="Health & Fitness">Health & Fitness</option>
                 <option value="History">History</option>
                 <option value="Home & Garden">Home & Garden</option>
                 <option value="Horror">Horror</option>
                 <option value="Entertainment">Entertainment</option>
                 <option value="Literature & Fiction">Literature & Fiction</option>
                 <option value="Medical">Medical</option>
                 <option value="Mysteries">Mysteries</option>
                 <option value="Parenting">Parenting</option>
                 <option value="Social Sciences">Social Sciences</option>
                 <option value="Religion">Religion</option>
                 <option value="Romance">Romance</option>
                 <option value="Science & Math">Science & Math</option>
                 <option value="Sports">Sports</option>
                 <option value="Travel">Travel</option>
                 <option value="Magzine">Magzine</option>
                 <option value="Question Bank">Question Bank</option>
               </select><br>

                 <label for="book_price">Price</label>
                 <input class="userinput" type="text" name="price" required><br>
                
                <input class="button1" type="submit" name="submit" value="SUBMIT">
              </form>
             </div>
               
              
            </div>
                      <div class="footer">
  	                       <p>&copycopyright 2019 UsedBooks.com</p>
                           <a href="feedback.php">Feedback</a> 
                       </div>
      
  </body>
</html>