<?php 

class User {
    public $name,$email,$password;

    public function __construct($name,$email,$password)
    {
        $this->name=$name;
        $this->password=$password;
        $this->email=$email;
    }
    
}

$u1 = new User("Dilan", "^@", "ee4");
$u1->name = "Brad";

var_dump($u1);

class Employee extends User{
    
}
?>