<?php
session_start();
include_once 'include/DBconnector-inc.php';
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width initial-scale=1">
    <meta name="keywords" content="muisic, albums, artists, singers, songs, RiNixQi">
    <meta name="description" content="Free muisic offered on RiNixQi">
    <link href="CSS/stylesheet.css" rel="stylesheet" type="text/css">
    <title>RiNixQi homepage</title>
    <link href="Pictures/Logo.png" rel="icon" >

</head>

<body>
    <header class="row">

        <div class="col-sm-4">
            <a href="index.php">
                <img alt="Logo" src="Pictures/Logo.png" class="logo"> </a>
        </div>
        <div class="searchBarDiv col-sm-4">
            <input type="text" placeholder="Search a song or an artist" class="searchBar">
            <button class="searchButton">Search</button>
        </div>
        <div class="col-sm-4">

            <?php
            include 'User/LoginOrUserID.php';
            ?>
    </div>
        

    </header>
    <main>
        <div class="outerMainDiv">
            <p class="topHits">
                Artists
            </p>
            <div class="borderDiv">
                <?php
                include 'include/getArtist.php';


                ?>
                
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