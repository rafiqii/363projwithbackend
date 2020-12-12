<?php
session_start();
if (isset($_POST['submit'])) {
    require_once 'DBconnector-inc.php';
    require_once 'fileFunctions-inc.php';
    $userID = $_SESSION["userID"];
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $fileTmpname = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $filename);
    $fileActuleExt = strtolower(end($fileExt));
    $allow = array('apng', 'gif', 'ico', 'cur', "jpg", 'jpeg', 'jfif', 'pjpeg', 'pjp', 'png', 'svg');
    if (allowedExt($fileActuleExt, $allow) !== false) {
        header("Location: ../Artiest/UploadeMusic.php?error=ectnotallowed");
        exit();
    }
    if (checkError($fileError) !== false) {
        header("Location: ../Artiest/UploadeMusic.php?error=somthingWrong");
        exit();
    }
    if (fSize($fileSize) !== false) {
        header("Location: ../Artiest/UploadeMusic.php?error=TooBig");
        exit();
    }

    uploadePP($conn, $fileActuleExt, $fileTmpname, $userID);
}
