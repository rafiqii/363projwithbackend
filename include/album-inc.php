<?php
session_start();
if (isset($_POST['submit'])) {

    $albumName = $_POST['AlbumName'];
    $description = $_POST['albumDescription'];

    require_once 'DBconnector-inc.php';
    require_once 'functions-inc.php';
//

    //sql to insert

    $sql = 'INSERT INTO albums  (artiestID  , albumname  , description  ) VALUES ("' . $_SESSION['userID'] . '" , "' . $albumName . '" , "' . $description . '")';
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('course info added successfully ');</script>";
    } else {
        echo "<script>alert('Error adding info');</script>";

    }
    mysqli_close($conn);
    header("Location:../index.php");

}
