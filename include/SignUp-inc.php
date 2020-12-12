<?php
if (isset($_POST['Submit'])) {

    $uName = $_POST['Username'];
    $email = $_POST['Email'];
    $DoB = $_POST['DoB'];
    $Password = $_POST['Password'];
    $rePassword = $_POST['rePassword'];
    echo ("<script>alert('" . $DoB . "');</script>");
//
    require_once 'DBconnector-inc.php';
    require_once 'functions-inc.php';

    //sql to insert

    if (invalidUsername($uName) !== false) {
        header("Location: ../SignUp.php?error=wrongUsername");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("Location: ../SignUp.php?error=wrongEmail");
        exit();
    }
    if (passwordConfirmation($Password, $rePassword) !== false) {
        header("Location: ../SignUp.php?error=notmatch");
        exit();
    }

    usernamexists($conn, $uName, $email);
    if (createUser($conn, $uName, $email, $DoB, $Password) !== false) {
        header("Location: ../SignUp.php?error=nsomthinWrong");
        exit();
    }

    if (mysqli_query($conn, $sql)) {
        echo "course info added successfully";
    } else {
        echo "<script>alert('Error adding info');</script>";

    }
    mysqli_close($conn);

}
