<?php

function invalidUsername($uName)
{
    $flag;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $uName)) {
        $flag = true;
    } else {

        $flag = false;
    }
    return $flag;
}

function invalidEmail($email)
{
    $flag;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $flag = true;
    } else {

        $flag = false;
    }
    return $flag;
}

function passwordConfirmation($Password, $rePassword)
{
    $flag;
    if ($Password !== $rePassword) {
        $flag = true;
    } else {
        $flag = false;
    }
    return $flag;
}

function usernamexists($conn, $uName, $email)
{
    $sql = "SELECT * FROM users WHERE UserName = ? OR Email = ?;";
    $init = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($init, $sql)) {
        header("Location: ../SignUp.php?error=initfailed");
        exit();
    }
    mysqli_stmt_bind_param($init, "ss", $uName, $email);
    mysqli_stmt_execute($init);
    $initresult = mysqli_stmt_get_result($init);

    if ($row = mysqli_fetch_assoc($initresult)) {
        return $row;
    } else {
        $flag = false;
        return $flag;
    }
}

function createUser($conn, $uName, $email, $DoB, $Password)
{
    $flag;
    $sql = 'INSERT INTO users (UserName , Email ,Password, DoB) VALUES ("' . $uName . '", "' . $email . '" , "' . $Password . '" , "' . $DoB . '");';
    if (!mysqli_query($conn, $sql)) {
        $flag = true;
    } else {
        $flag = false;
        header("Location: ../SignUp.php?error=nsomthinWrong");
        exit();
    }
    return $flag;
}

function loginUser($conn, $uName, $Password)
{
    $userData = usernamexists($conn, $uName, $uName);
    if ($userData == false) {
        header("Location: ../SignUp.php?error=invalidUser");
        exit();
    }
    $userPassword = $userData["Password"];
    if ($userPassword !== $Password) {
        header("Location: ../SignUp.php?error=invalidPassword");
        exit();
    } else if ($userPassword === $Password) {
        session_start();
        $_SESSION['userID'] = $userData["userID"];
        $_SESSION['uName'] = $userData["UserName"];
        $_SESSION['type'] = $userData["Type"];
        echo "test";
        header("Location: ../index.php?'" . $_SESSION['userID'] . "'");
        exit();
    }}
?>