<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
if(isset($_POST['submit'])){
    if(isset($_POST['username'])&&isset($_POST['password'])){
        $username = $_POST['username'];
        $idnumber = $_POST['idnumber'];
        $email =$_POST['email'];
        $password = $_POST['password'];
        

$host ="localhost";
$dbname="root";
$dbpassword="";
$db="administration";
$con = mysqli_connect($host,$dbname,$dbpassword,$db);

// database insert SQL code

  $s="SELECT COUNT(*) FROM signup WHERE email='$email' ";
  

$sql = "INSERT INTO signup (username, idnumber, email, password) VALUES ('$username', '$idnumber', '$email', '$password')";

    if($s==0){
    $rs = mysqli_query($con, $sql);
    if($rs)
    {
        echo '<script> setTimeout(function(){alert("Welcome to VIGNAN");},1000);
        </script>';
        include("img.php");
    }
    else{
        echo '<script>alert("Sorry please try again.")</script>';
        include("adsignup1.php");
    }
    }
    else{
        echo '<script>alert("Email already exists,try with another email.")</script>';
        include("adsignup1.php");

    }

   
}

// insert in database 

}
?>