<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MyDB";

// Create connection
$conn = new mysqli($servername, $username, $password);
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE $dbname";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error in creating database" . mysqli_error($conn);
}

// connect with database
$selected_db = mysqli_select_db($conn, $dbname);
// Check connection
if (!$selected_db) {
    die("Connection Failed: " . mysqli_error($conn));
}

//create tables

$sql_users = "CREATE TABLE users (
        userID INT(9) NOT NULL AUTO_INCREMENT,
        UserName VARCHAR(256) NOT NULL ,
        Email VARCHAR(256) NOT NULL ,
        Password VARCHAR(256) NOT NULL,
        DoB DATE NOT NULL,
        Type INT(1) NOT NULL DEFAULT 1,
        PRIMARY KEY (userID),
	    UNIQUE(UserName)

        )";

if (mysqli_query($conn, $sql_users)) {
    echo "Table users created successfully. <br>";
} else {
    die("<br> ERROR creating table: " . mysqli_error($conn));
}
///
$sql_songs = "CREATE TABLE songs (
        songID INT(9) NOT NULL AUTO_INCREMENT,
        artiestID INT(9) NOT NULL ,
        albumID INT(9) NOT NULL,
        Title VARCHAR(256) NOT NULL,
        SongFile VARCHAR(256) NOT NULL,
        PRIMARY KEY (songID)
    )";

if (mysqli_query($conn, $sql_songs)) {
    echo "Table songs created successfully. <br>";
} else {
    die("<br> ERROR creating table: " . mysqli_error($conn));
}
///////////////////////////////////////////////////////////////////////////////
$sql_albums = "CREATE TABLE albums (
    albumID INT NOT NULL AUTO_INCREMENT ,
    artiestID INT(9) NOT NULL ,
    albumname VARCHAR(256) NOT NULL,
    description VARCHAR(256) NOT NULL,
    PRIMARY KEY (albumID)
)";

if (mysqli_query($conn, $sql_albums)) {
    echo "Table Albums created successfully. <br>";
} else {
    die("<br> ERROR creating table: " . mysqli_error($conn));
}

/////////////////////////////////////////////////////
$sql_following = "CREATE TABLE following (
    userID INT(9) NOT NULL ,
    artiestID INT(9) NOT NULL ,
    PRIMARY KEY (userID , artiestID )
)";

if (mysqli_query($conn, $sql_following)) {
    echo "Table following created successfully. <br>";
} else {
    die("<br> ERROR creating table: " . mysqli_error($conn));
}
/////////////////////////////////////////////////////
$sql_announcement = "CREATE TABLE announcement  (
    announcementID INT(11) NOT NULL  AUTO_INCREMENT  ,
    artiestID INT(9) NOT NULL ,
    description VARCHAR(3000) NOT NULL,
    PRIMARY KEY (announcementID)
)";

if (mysqli_query($conn, $sql_announcement)) {
    echo "Table announcement created successfully. <br>";
} else {
    die("<br> ERROR creating table: " . mysqli_error($conn));
}
//////////////////////////////
$sql_favourites = "CREATE TABLE favourites  (
    songID INT(11) NOT NULL ,
    userID INT(9) NOT NULL ,
    PRIMARY KEY (songID, userID)
)";

if (mysqli_query($conn, $sql_favourites)) {
    echo "Table favs created successfully. <br>";
} else {
    die("<br> ERROR creating table: " . mysqli_error($conn));
}
$sql_profilePicture = "CREATE TABLE profilePicture  (
    picID int(9) not null AUTO_INCREMENT,
    artiestID INT(9) NOT NULL ,
    flag int(9) not null ,
    PRIMARY KEY (picID)
)";
if (mysqli_query($conn, $sql_profilePicture)) {
    echo "Table pp created successfully. <br>";
} else {
    die("<br> ERROR creating table: " . mysqli_error($conn));
}
// Close connection
mysqli_close($conn);
