<?php
session_start();
require_once 'include/DBconnector-inc.php';
$uID = $_GET['userID'];
$query = "SELECT * FROM users where userID='$uID'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

?>



<script>
    function showUser(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML =
                '<audio controls >  <source type="audio/mpeg">Your browser does not support the audio element. </audio>';
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "Artiest/getSongs.php?q=" + str, true);
        xmlhttp.send();
    }
</script>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta name="keywords" content="muisic, albums, artists, singers, songs, RiNixQi, Talal, Madah">
    <meta name="description" content="Listen to Talal maddah for free">
    <link href="CSS/stylesheet.css" rel="stylesheet" type="text/css">

    <?php echo '<title>' . $row[1] . '</title>'; ?>
    <link href="Pictures/Logo.png" rel="icon">

</head>

<body>
    <div class="container">

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
        <!-- outer div -->
        <div class="outerArtistDiv ">
            <!-- head of main div -->
            <div class="topAristElements row">
                <div class="singerInfoDiv col-sm-4">
                    <?php
                    $check = "SELECT * FROM profilePicture WHERE artiestID = '" . $uID . "' ";
                    $result1 = mysqli_query($conn, $check);
                    if (mysqli_num_rows($result1) > 0) {
                        echo '<img src="Pictures/pp' . $uID . '.jpg" alt="Talal Maddah"> ';
                    } else {
                        echo '<img src="Pictures/singer.jpg" alt="Talal Maddah"> ';
                    }
                    echo '<p>' . $row[1] . '</p>';

                    ?>
                </div>

                <button type="submit" id="searchButton" class="searchButton col-sm-4"> Follow </button>
                <script>
                    $('#searchButton').click(function() {
                        var jsonData = JSON.stringify(<?php echo $uID ?>);
                        alert(<?php echo $uID ?>);
                        $.ajax({
                            type: "POST",
                            url: 'include/following-inc.php',
                            data: {
                                data: jsonData
                            },
                            success: function(data) {
                                alert(data);
                            }
                        });
                    });
                </script>
                <div class="followersAndFollowing col-sm-4">
                    <p>
                        <?php

                        $sql1 = "SELECT COUNT(*) as total1 FROM following WHERE artiestID= '.$uID.'";
                        $result1 = mysqli_query($conn, $sql1);
                        $data1 = mysqli_fetch_assoc($result1);
                        echo "Followers :" . $data1['total1'] . "<br>";

                        $sql2 = "SELECT COUNT(*) as total2 FROM following WHERE userID= '.$uID.'";
                        $result2 = mysqli_query($conn, $sql2);
                        $data2 = mysqli_fetch_assoc($result2);
                        echo "Following :" . $data2['total2'] . "<br>";

                        ?>
                    </p>

                </div>

            </div>
            <div class="row" id="txtHint">

            </div>
            <!-- here starts the main info of the artist -->
            <div class="outerArtistDiv ">
                <div class="midArtistElements row">
                    <div class="widthContainer col-sm-4">
                        <!-- dictates albums-->
                        <p class="albumsTXT">
                            Albums
                        </p>
                        <div class="albumsOuterDiv">
                            <!-- this is some dummy data to help visualize when working on JS/JQ -->
                            <div class="albumInnerDiv">
                                <select class="form-select form-select-lg mb-3 " size="5" aria-label="size 3 select example" id="albumy" name="albumID">
                                    <?php

                                    $sql = mysqli_query($conn, "SELECT  albumID , albumname FROM albums WHERE artiestID ='" . $uID . "'");
                                    echo '<option value="-1"> select an album</option>';

                                    while ($row = $sql->fetch_assoc()) {

                                        unset($aid, $aName);
                                        $aid = $row['albumID'];
                                        $aName = $row['albumname'];

                                        echo '<option value="' . $aid . '">' . $aName . '</option>';
                                    }

                                    ?>
                                </select>

                            </div>
                            <hr>
                        </div>
                    </div> <!-- end of albums-->

                    <div class="widthContainer col-sm-4">
                        <p class="albumsTXT">
                            Songs
                        </p>
                        <div class="albumsOuterDiv">
                            <div>
                                <div class="countries_container">

                                </div>
                                <script>
                                    document.getElementById("albumy").addEventListener("change", myFunction);

                                    function myFunction() {
                                        var id = $(this).val();
                                        var jsonData = JSON.stringify(id);
                                        $.ajax({
                                            type: 'POST',
                                            url: 'script.php',
                                            data: {
                                                data: jsonData
                                            },
                                            success: function(data) {
                                                $(".countries_container").html(data);


                                            }
                                        });
                                    };
                                </script>

                                <button type="submit" class="searchButton"> add to Favs </button>
                                <script>
                                    $('#favourite').click(function() {
                                        var e = document.getElementById("songs");
                                        var selectedID = e.options[e.selectedIndex].value;
                                        var jsonData = JSON.stringify(selectedID);
                                        $.ajax({
                                            type: "POST",
                                            url: 'Artiest/favourites-inc.php',
                                            data: {
                                                data: jsonData
                                            },
                                            success: function(data) {}
                                        });
                                    });
                                </script>
                            </div>
                        </div><!-- end of songs-->
                    </div>
                    <div id="announcment">
                        <?php
                        $sql = "SELECT  description	 FROM announcement WHERE artiestID = '" . $uID . "'";
                        $result = mysqli_query($conn, $sql);

                        while ($rows = $result->fetch_assoc()) {
                            echo ("<div class='body'>" . $rows['description'] . "</div>");
                        }

                        ?>
                    </div>


                </div>
            </div>

        </div>

    </main>

    <footer>
        <div>
            <a href="whoAreWe.php">
                <p> Who are we</p>
            </a>
        </div>
        <div>
            <a href="whatIsRiNixQi.php">
                <p>
                    What is RiNixQi
                </p>
            </a>
        </div>

        <div>
            <a href="http://www.twitter.com"><img alt="twitter" src="Pictures/twitterLogo.png" class="twitterLogo"></a>
        </div>
    </footer>
    </div>
</body>

</html>