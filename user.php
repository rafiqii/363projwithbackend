<?php
session_start();
require_once 'include/DBconnector-inc.php';


$uID = $_SESSION['userID'];
$query = "SELECT * FROM users where userID='$uID'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>
<script>

function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML=
    '<audio controls >  <source type="audio/mpeg">Your browser does not support the audio element. </audio>';
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","Artiest/getSongs.php?q="+str,true);
  xmlhttp.send();
}



</script>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="CSS/stylesheet.css" rel="stylesheet" type="text/css">
    <title>
        <?php
        echo $_SESSION['uName'] . "'s Page"
        ?>
    </title>
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
        <!--This page can only appear if M7md logs in-->
        <!-- outer div -->
        <div class="outerArtistDiv">
            <!-- head of main div -->
            <div class="topAristElements">

                <button class="searchButton" style="width: auto;">Apply to becoma an artist</button>
                <div class="followersAndFollowing">
                    <p>
                        following:12
                    </p>
                </div>

            </div>
            <!-- here starts the main info of the user -->
            <div class="outerArtistDiv">
                <div class="midArtistElements">
                    <div class="widthContainer">
                        <!-- dictates Favorite songs-->
                        <p class="albumsTXT">
                            Favourite songs
                        </p>
                        <div class="albumsOuterDiv">
                            <select class="form-select" size="5" aria-label="size 3 select example" id="songs" name="songs" onchange="showUser(this.value)">
                                
                                <?php

$sql = "SELECT  Title , songID
                                    FROM songs
WHERE songID in (
SELECT songID
from favourites
WHERE userID='" . $_SESSION['userID'] . "');";
                                $result = mysqli_query($conn, $sql);
                                echo '<option value="-1"> select an album</option>';
                                while ($row = mysqli_fetch_assoc($result)) {
                                    
                                    unset($aid, $aName);
                                    $aid = $row['songID'];
                                    $aName = $row['Title'];
                                    
                                    echo '<option value="' . $aid . '">' . $aName . '</option>';
                                } ?>
                            </select>
                            
                            <div id="txtHint" class="col-10-sm" ></div>
                        </div>
                    </div> <!-- end of favourite songs-->
                    <div class="widthContainer">
                        <!-- dictates Feed-->
                        <p class="albumsTXT">
                            Feed
                        </p>
                        <div class="albumsOuterDiv">
                            <?php
                            include 'User/getann.php';
                            ?>

                        </div>
                    </div> <!-- end of favourite songs-->


                </div>
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
            <a href="http://www.twitter.com"><img alt="twitter" src="Pictures/twitterLogo.png" class="twitterLogo"><a>
        </div>
    </footer>
</body>

</html>