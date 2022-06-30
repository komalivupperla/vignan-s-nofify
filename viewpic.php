<?php

$msg="";
if (isset($_POST['upload'])){
      //path to store uploaded image
    $target="images/".basename($_FILES['image']['name']);
    
    $db=mysqli_connect("localhost","root","","image");

    $image= $_FILES['image']['name'];
    $text=$_POST['text'];
    $username=$_POST['username'];

    $sql="INSERT INTO img (image,text,username) VALUES('$image','$text','$username')";
    mysqli_query($db,$sql);
    
    //moving uploaded images into the folader
    if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
        $msg="uploaded successfully";
    }
    else{
        $msg="threr was a problem in uploading";
    }


}
?>

<!DOCTYPE html>
<html>
    <head>
        
        <title>
            images
        </title>
    

        <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Vignan's Notify - About</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/vig3.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
   
        <style type="text/css">
            body{
                background: #DBF9FC;
            }
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 5px solid #cbcbcb;
   color: white;
  background:  #136a8a;
  background: 
    -webkit-linear-gradient(to right, #267871, #136a8a);
  background: 
    linear-gradient(to right, #267871, #136a8a);
  margin: auto;
  box-shadow: 
    0px 2px 10px rgba(0,0,0,0.2), 
    0px 10px 20px rgba(0,0,0,0.3), 
    0px 30px 60px 1px rgba(0,0,0,0.5);
  border-radius: 8px;
  padding: 50px;
     
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 2px solid #cbcbcb;
    
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 400px;
   	height: 350px;
   }
</style>


    <body>
    <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Vignan's Notify</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a  href="about.html">About</a></li>
         
          <li><a href="contact.html">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="getstarted.html" class="get-started-btn">Get Started</a>

    </div>
  </header><!-- End Header -->

    <!-- End Header -->
        <div >
            <br><br><br><br><br>
            <form action="viewpic.php" method="POST" enctype="multipart/form-data" >
                <input type="hidden" name="size" value="1000000">
                <div>
                    <input type="file" name="image">
                </div>
                <br>
                <input type="text" name="username" placeholder="username">
                <div>
                    <textarea name="text" cols="40" rows="4" placeholder="Say somthing.....!"></textarea>
                </div>
                <div>
                    <input type="submit" name="upload" value="Post">
                </div>
            </form>
</div>

        <div id="content">
            
            <?php
            $db=mysqli_connect("localhost","root","","image");
            $sql="SELECT * FROM img ORDER BY id DESC";
            $result=mysqli_query($db,$sql);
            while($row= mysqli_fetch_array($result)){
               
                echo"<div id='img_div'>";
                echo "<p>" .$row['username']."</p>";
                
                    echo "<img src='images/".$row['image']."'>";
                    
                    echo "<p>" .$row['text']."</p>";
                   
                echo "</div>";

            }
            ?>

            
        </div>
    </body>
</html>