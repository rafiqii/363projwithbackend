<?php
require_once 'include/DBconnector-inc.php';
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <meta name="keywords" content="muisic, who, Rico, Rafiqi, Phoenix, RiNixQi">
    <meta name="description" content="Who created RiNixQi">
    <link href="CSS/stylesheet.css" rel="stylesheet" type="text/css">
    <title>who are we</title>
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
                Who are We?
            </p>
            <pre>
                A group of KFUPM students aspiring to create the new best music app.
                
                Meet the team:
                
                Rico: The team's software engineer responsible for desging the website's Diagrams
                So we can build  the front end and back end algorithems.

                PhoeNix: The team's hard working front/back end programmer that also helps in the 
                set up of the website diagrams.

                RafiQi: Just a humble programmer.

                Special thanks to: Scorch Levant for the logo.
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