<?php

// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
if(isset($_POST['submit'])){
    if(isset($_POST['username'])&&isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

$host ="localhost";
$dbname="root";
$dbpassword="";
$db="administration";
$con = mysqli_connect($host,$dbname,$dbpassword,$db);

$sql = "select *from signup where username = '$username' and password = '$password'";  
$result = mysqli_query($con, $sql);  
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
$count = mysqli_num_rows($result);  
  
if($count == 1){  
    echo '<script> setTimeout(function(){alert("Welcome to VIGNAN");},1000);
        </script>';

        include("img.php"); 
}  
else{  
    echo '<script>alert("Sorry please try again.")</script>';
    include("adlogin1.php");  
}     



// insert in database 
    }
    
}
?>