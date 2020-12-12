<?php

function allowedExt($fileActuleExt, $allow)
{
    $flag;
    if (!in_array($fileActuleExt, $allow)) {
        $flag = true;
    } else {
        $flag = false;
    }
    return $flag;
}
function fSize($fileSize)
{
    $flag;
    if ($fileSize > 10000000) {
        $flag = true;
    } else {
        $flag = false;
    }
    return $flag;
}

function checkError($fileError)
{
    $flag;
    if ($fileError !== 0) {
        $flag = true;
    } else {
        $flag = false;
    }
    return $flag;
}
function uploadeFile($conn, $Title, $albumID, $fileActuleExt, $fileTmpname)
{
    $filenameNew = uniqid('', true) . "." . $fileActuleExt;
    $fileDes = '../media/' . $filenameNew;
    move_uploaded_file($fileTmpname, $fileDes);
    $sql = 'INSERT INTO songs (artiestID , albumID ,Title, SongFile) VALUES ( "' . $_SESSION['userID'] . '" , "' . $albumID . '" , "' . $Title . '" ,  "' . $filenameNew . '" )';
    if (mysqli_query($conn, $sql)) {

        echo "course info added successfully";

    } else {
        echo "<script>alert('Error adding info');</script>";

    }
}

function uploadePP($conn, $fileActuleExt, $fileTmpname, $userID)
{
    $filenameNew = "pp" . $userID . "." . $fileActuleExt;
    $fileDes = '../Pictures/' . $filenameNew;
    move_uploaded_file($fileTmpname, $fileDes);
    $check = "SELECT * FROM profilePicture WHERE artiestID = '" . $_SESSION['userID'] . "' ";
    $result1 = mysqli_query($conn, $check);
    if (mysqli_num_rows($result1) == 0) {
        $sql = 'INSERT INTO profilePicture (artiestID , flag ) VALUES ( "' . $_SESSION['userID'] . '" , 0 ) ';

        if (mysqli_query($conn, $sql)) {

            echo "course info added successfully";

        } else {
            echo "<script>alert('Error adding info');</script>";

        }
    }}
?>