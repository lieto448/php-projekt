<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdReapeat){
    global $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdReapeat)){
        $result = true;       

    }else {
        $result = false;
    }

    return $result;
}

function invalidEmail($email){
    global $result;
    if ( !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;       

    }else {
        $result = false;
    }

    return $result;
}

function pwdMatch($pwd, $pwdReapeat){
    global $result;
    if ( $pwd !== $pwdReapeat){
        $result = true;       

    }else {
        $result = false;
    }

    return $result;
}

function createUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users (users_name, users_email, users_uid, users_pwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
}
?>