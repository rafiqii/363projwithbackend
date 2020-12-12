<?php
session_start();
if (isset($_POST['submit'])) {
    require_once 'DBconnector-inc.php';
    require_once 'fileFunctions-inc.php';

    $Title = $_POST['Title'];
    $albumID = $_POST['albumID'];
    $file = $_FILES['file'];
    $filename = $_FILES['file']['name'];
    $fileTmpname = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $filename);
    $fileActuleExt = strtolower(end($fileExt));
    $allow = array('mp3', "pdf");
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

    uploadeFile($conn, $Title, $albumID, $fileActuleExt, $fileTmpname);
}
