<?php

if (isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdReapeat = $_POST["pwdrepeat"];

    require_once "dbh.php";
    require_once "extra_functions.php";

    //čokoľvek len nie false
    /*
    if (emptyInputSignup($name, $email, $username, $pwd, $pwdReapeat) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    
    

    if (invalidEmail($email) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }

    if (pwdMatch($pwd, $pwdReapeat) !== false){
        header("location: ../signup.php?error=pwdnotmatch");
        exit();
    }

    */

    createUser($conn, $name, $email, $username, $pwd);

} 
?>