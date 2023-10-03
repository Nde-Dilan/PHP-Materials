<?php 

$dsn = "mysql:host=localhost;dbname=world";
$username = 'root';
$password = '123456789';

    try {
        $db = new PDO($dsn,$username,$password);
    } catch (PDOException $e) {
        include('view/error.php');
        $error_message ="Database error".$e->getMessage();
        exit();
    }
?>
