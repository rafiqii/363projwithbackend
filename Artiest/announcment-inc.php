<?php
session_start();

require_once 'DBconnector-inc.php';
$sql = "SELECT  description	 FROM announcement WHERE artiestID = '" . $_SESSION['userID'] . "'";
$result = mysqli_query($conn, $sql);

while ($row = $result->fetch_assoc()) {
    echo ("<div class='body'>" . $row['description'] . "</div>");
}
