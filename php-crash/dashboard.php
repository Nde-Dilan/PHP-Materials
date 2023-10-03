<?php
//Check for the session  var 
session_start();

if(isset($_SESSION["username"])){
    echo "<h1>Welcome back, ". $_SESSION['username'] ." </h1>";
    echo "<a href='logout.php'> Logout </a>";
}else{
    echo "Masaka!";
}

?>