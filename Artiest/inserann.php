<?php
session_start();
if (isset($_POST['submit'])) {

    $description = $_POST['description'];

    require_once 'DBconnector-inc.php';
    require_once 'functions-inc.php';
//

    //sql to insert

    $sql = 'INSERT INTO announcement  (artiestID  , description  ) VALUES ("' . $_SESSION['userID'] . '" , "' . $description . '")';
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('course info added successfully ');</script>";
    } else {
        echo "<script>alert('Error adding info');</script>";

    }
    mysqli_close($conn);
    header("Location:../index.php");

}
