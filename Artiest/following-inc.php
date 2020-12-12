<?php
session_start();
$artiestID = json_decode($_POST['data']);

require_once 'DBconnector-inc.php';
//

//sql to insert

$sql = 'INSERT INTO following  (userID , artiestID) VALUES ("' . $_SESSION['userID'] . '" , "' . $artiestID . '")';
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('course info added successfully ');</script>";
} else {
    echo "<script>alert('Error adding info');</script>";

}
mysqli_close($conn);
header("Location:../index.php");
