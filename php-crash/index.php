<?php
// echo "100" + 10;

// print 55;
// print_r([2, 5, 7, 8, 4,]);
// var_dump(5);
// /* Variable always start with $, and we follow the same convention as for python*/
// $name = "Hello";
// echo "Name is " . $name;
// echo "Name is {$name}";

// /* To define constant , we use the define keyword, the convention is all uppercase*/
// define('DB_NAME', 'dev_db');
// define('AGE', 18);

// /*
// They are differnt types of array here
// */
// //Simple array
// $numbers = [1, 2, 3, 4, 5, 6];
// //or 
// $fruits = array('apple', 'banana', 'orange', 'pear');

// //Associative array
// $colors = [
//     1 => 'red',
//     'r' => 'blue',
//     2 => 'green',
//     'array' => [2, 5, 8, 8, 8]
// ];

// //Multidimentional array
// var_dump($fruits);
// print_r($colors['array']);
// echo "<br><br>";
// /*Conditional */
// $t = date("H");
// if ($t > 12) {

//     echo $t;
// } elseif ($t > 4) {
//     echo 'Hello';
// }
// echo "<br><br>";
// $posts = array(1, 4, 5, 2,);
// $firstPost = $posts[0] ?? null;
// echo $firstPost;

// $favcolor = 'red';
// echo "<br><br>";
// /*Switch case */
// switch ($favcolor) {
//     case 'red':
//         echo "Your favorite color is red";
//         break;
//     default:
//         echo "Idiot";
// }

// echo "<br><br><br><br><br>";
// /*Loops */

// for ($x = 0; $x <= 10; $x++) {
//     echo "$x <br>\n ". 65;
// }
// echo "<br><br><br><br><br>";
// //Foreach Loop 

// $posts_ = ['firstPost','secondPost','thirdPost'];

// foreach($posts_ as $i=> $el){
//     echo$i+1 . "-" . $el . '<br>';
// }
// echo "<br><br><br>";

// function registerUser($usrname,$email){
//     echo "New user added : <br> name: " .$usrname . "<br> Email: " . $email ."<br>";
// }

// // registerUser("Dilan","@")

// function sum($n){
//     if($n==0){
//         return 0;
//     }else{
//         return $n + sum($n-1);
//     }
// }
// $result = sum(140);
// echo $result;

// $sub = function($n1,$n2) {return $n1-$n2;};

// $substract = fn($n1,$n2) => $n1-$n2;

// echo $substract(4,5);

// echo "<br><br><br>";

// /*Arrays functions */
// $fruits = ['apple', 'banana', 'orange', 'pear'];

// echo array_product($posts);

// $a = range(1, 20);

// $newNumbers = array_map(function($n){
//     return " Number $n";
// },$numbers);

// print_r($newNumbers);

// $s = array_reduce($posts, fn($carry, $number)=> $carry + $number);
// echo $s;

/** Super Globals  */
// They are built in variables that are always available in all scopes
if(isset($_POST["submit"])){
    // echo $_GET["name"] ? $_GET["name"] : "";
    // echo $_GET["age"];
    /* Sanitize inputs*/
    // $name =htmlspecialchars($_POST["name"]);
    // $age =htmlspecialchars($_POST["age"]);
    $name =filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
    $age =htmlspecialchars($_POST["age"]);
    echo $name ;
    echo $age;
}


//Cookies

//Set cookie

setcookie("name","Dilan",time()+86400*30);

if(isset($_COOKIE["name"])){

    echo "<h1>Hello ". $_COOKIE['name'] . ", Welcome back!";
}

//Delete cookie
setcookie('name','',time()-999999);

/************************ Sessions ********************/
/*Session are a way to store information (in variables) to be used across multiple pages. Unlike cookies, sessions are store on the server*/
session_start();
if(isset($_POST["submit"])){
    
    $username =filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
    $password =$_POST["password"];

    if($username == "Dilan" && $password == "123"){
        $_SESSION["username"] = $username;
        header('Location: /dashboard.php');
    }else{
        echo "<script>alert('invalid credentials');</script>";
    }


}

?>



<a href="<?php echo $_SERVER["PHP_SELF"]; ?>?name=End &age=45">Click</a>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
    <div style="display: flex; flex-direction:column;">
        <label for="name">Name: </label>
        <input type="text" name="name" placeholder="Your name">
        <label for="name">Age: </label>
        <input type="text" name="age" placeholder="Your age">

        <input type="submit" value="submit" name="submit">

    </div>
</form>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
    <div style="display: flex; flex-direction:column;">
        <label for="username">username: </label>
        <input type="text" name="username" placeholder="Your username">
        <label for="password">password: </label>
        <input type="password" name="password" placeholder="Your password">

        <input type="submit" value="submit" name="submit">

    </div>
</form>






































<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
   
</body>

</html>