<?php
$querydesc="SELECT Description 
from announcement 
WHERE artiestID IN(
    
SELECT artiestID 
from following 
WHERE userID='" .$_SESSION['userID'].  "');";
$resultdesc = mysqli_query($conn, $querydesc);
///////////////////////////
$queryID = "SELECT artiestID 
from following 
WHERE userID='" .$_SESSION['userID'].  "');";
$resultID = mysqli_query($conn, $queryID);

// $query="SELECT Title from songs WHERE songID='" .$_SESSION['userID'].  "';";
// $resultsongtitle = mysqli_query($conn, $querydesc);
$queryName="
SELECT UserName 
from users 
WHERE userID IN (
    
    SELECT artiestID as userID
    from following 
    WHERE userID='" .$_SESSION['userID'].  "');";
    $resultName = mysqli_query($conn, $queryName);
    
    while ($row = mysqli_fetch_assoc($resultdesc)) {
        $rowName =mysqli_fetch_assoc($resultName);
        $rowID= mysqli_fetch_assoc($resultID);
        var_dump($rowName);
echo '<div class="albumInnerDiv">
<img alt="albumpic" src="Pictures/pp'.$rowID["userID"].'">
<p>
    '.$rowName['UserName'].': 
    <br>
    '.$row['Description'].'
</p>
</div>
<hr>';


}


?>
