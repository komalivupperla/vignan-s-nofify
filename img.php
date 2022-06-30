<?php  
 $connect = mysqli_connect("localhost", "root", "", "testing");  
 if(isset($_POST["insert"]))  
 {  


      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 
      $text =$_POST['text']; 
      $username=$_POST['username'];
      $query = "INSERT INTO tbl_images(name,text,username) VALUES ('$file','$text','$username') ";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Post successful")</script>';  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
        
          
          <link rel="stylesheet" href="imgcss.css" type="text/css">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Vignan's Notify</title>
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
      </head>  

      
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
           
           <div >  
           <br><br><br><br><br><br><br><br><br>
                <h3 style="font-color:#ff34f5;">Welcome to VIGNAN</h3>  
                <br />  
                <div>
                <form method="post" enctype="multipart/form-data" >  
                    
                     <input type="file" name="image" id="image"  />  
                     <br/>  
                     <textarea name="text" cols="40" rows="4" placeholder="Say somthing.....!" ></textarea>
                     <br>
                     <input type="text" name="username" placeholder="Username" id="head">
                     <br>
                     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />  
                     
          </div>
                 
                <center>
                <div>
                <?php  
                $query = "SELECT * FROM tbl_images ORDER BY id DESC";  
                $result = mysqli_query($connect, $query);  
                while($row = mysqli_fetch_array($result))  
                {   
                    echo "<br>";
                    echo"<div >";
                    echo "<p>" .$row['username']."</p>";
                     echo  '
                     <img src="data:image/jpeg;base64,'.base64_encode($row['name'] ).'" height="300" width="400" class="img-thumnail" /> 
                        ' ;
                        echo "<br>";
                    echo "<p>" .$row['text']."</p>";
                     echo "</div>";
                       
                     
                }  
                ?>  
                </div>
                </center>
                
               </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>