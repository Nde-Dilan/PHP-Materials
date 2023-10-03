<?php

//data source name
$dsn = "mysql:host=localhost;dbname=assignement_tracker";
$username = 'Dilan';
$password = '123456';

try{
    //PDO --> PHP Data Object
    $db = new PDO($dsn,$username,$password);
}catch(PDOException $err){
    echo "Database Error ". $err->getMessage();
    include('view/error.php');
    exit();
}

?>