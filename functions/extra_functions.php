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

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE users_uid = ? OR users_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
            return $row;
    }else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function emptyInputLogIn($username, $pwd){
    global $result;
    if (empty($username) || empty($pwd)){
        $result = true;       

    }else {
        $result = false;
    }

    return $result;
}

function loginUser($conn, $username, $pwd){
    $uidExists =  uidExists($conn, $username, $username);

    if ($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["users_pwd"];
    
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
    }else if ($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["users_id"];
        $_SESSION["useruid"] = $uidExists["users_uid"];
        header("location: ../index.php");
        exit();
    }
}

?>