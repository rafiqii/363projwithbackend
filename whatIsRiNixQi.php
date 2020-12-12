<?php
require_once 'include/DBconnector-inc.php';
session_start();

?>
<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <meta name="keywords" content="muisic, albums, artists, singers, songs, RiNixQi, What">
    <meta name="description" content="What is RiNixQi">
    <link href="CSS/stylesheet.css" rel="stylesheet" type="text/css">
    <title>what is RiNixQi</title>
    <link href="Pictures/Logo.png" rel="icon">

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
        <div class="whoSlashWhatDiv">
            <p>
                What is <b class="boldRiNixQi">RiNixQi</b>?
            </p>
            <p style="text-align: center;"><b class="boldRiNixQi">Ri</b>co
                phoe<b class="boldRiNixQi">Nix</b>
                Rafi<b class="boldRiNixQi">Qi</b></p>
            <pre>
        RiNixQi is a free music streaming website that allows people to  
        browse, follow artists, like songs and much more.
            </pre>
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