<?php

include_once 'Header.php';

?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <meta name="keywords" content="muisic, Signup, user, artists, singers, songs, RiNixQi">
    <meta name="description" content="Dont have an account? Sign up to listen free muisic offered on RiNixQi">
    <link href="CSS/stylesheet.css" rel="stylesheet" type="text/css">
    <title>Sign up</title>
    <link href="Logo.png" rel="icon">

</head>

<body>
    <header class="row">

        <div class="col">
            <a href="index.php">
                <img alt="Logo" src="Pictures/Logo.png" class="logo"> </a>
        </div>
        <div class="searchBarDiv col">
            <input type="text" placeholder="Search a song or an artist" class="searchBar">
            <button class="searchButton">Search</button>
        </div>
        <div class="col">

            <?php
            include 'User/LoginOrUserID.php';
            ?>
        </div>


    </header>
    <main>
        <div>
            <p class="loginTXT">
                Signup
            </p>
            <div class="outerLogin">
                <div>
                    <form action="include/SignUp-inc.php" method="post">
                        <div class="emailDiv">
                            <p>UserName</p> <input type="text" placeholder="Jhon Doe" name="Username">
                        </div>
                        <div class="emailDiv">
                            <p>Email: </p> <input type="email" placeholder="JhonDoe@xmail.com" name="Email">
                        </div>
                        <div class="dobDiv">
                            <p>Date of birth</p> <input type="date" name="DoB">
                        </div>
                        <div class="passwordDiv">
                            <p>Password: </p> <input type="password" placeholder="******" name="Password">
                        </div>
                        <div class="dobDiv">
                            <p>rewrite password</p> <input type="password" placeholder="******" name="rePassword">
                        </div>
                        <div class="emailDiv">
                            <p>I am an artist</p>
                            <input type="checkbox" name="isArtist">
                        </div>
                        <button class="loginButton" name="Submit">Sign up</button>
                    </form>
                </div>


            </div>
        </div>
    </main>
    <footer class="row">
        <div class="col">
            <a href="whoAreWe.php">
                <p> Who are we</p>
            </a>
        </div>
        <div class="col">
            <a href="whatIsRiNixQi.php">
                <p>
                    What is RiNixQi
                </p>
            </a>
        </div>

        <div class="col">
            <a href="http://www.twitter.com"><img alt="twitter" src="Pictures/twitterLogo.png"
                    class="twitterLogo"><a>
        </div>
    </footer>

</body>

</html>