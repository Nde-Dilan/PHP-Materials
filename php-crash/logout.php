<?php 

session_start();
echo "<h1>Good bye " . $_SESSION["username"] . " </h1>";

//session destroy

session_destroy();
header('Location:/index.php')
?>