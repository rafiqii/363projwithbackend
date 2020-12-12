<?php
if (isset($_POST['Submit'])) {
    $uName = $_POST['Username'];
    $Password = $_POST['Password'];

    require_once 'DBconnector-inc.php';
    require_once 'functions-inc.php';
//

    //sql to insert
    loginUser($conn, $uName, $Password);

}
