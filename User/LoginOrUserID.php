<?php
require_once 'include/DBconnector-inc.php';

if(!isset($_SESSION['userID'])){
    echo '<div class="login">
    <a href="login.php">
    <img alt="login pic" src="Pictures/LoginPicture.png" class="loginPic">
    <p>
    Sign in / Sign up
    </p>
    </a>
    </div>';
}else{
    echo '<div class="login">
    <p style="font-size:30px; align-self:center;">
        <a href="user.php" style="color: purple; "> '.$_SESSION["uName"].' </a>
    </p>
    </a>
    </div>
    <a href="include/Logout-inc.php">
            <button class="searchButton">Logout</button></a>
        ';
}
?>  