<?php
$querysongtitle="
SELECT Title 
from songs 
WHERE songID IN (
    
SELECT songID 
from favourites 
WHERE userID='" .$_SESSION['userID'].  "')";
$resultsongtitle = mysqli_query($conn, $querysongtitle);
echo var_dump($resultsongtitle);
// $querysongtitle="SELECT Title from songs WHERE songID='" .$_SESSION['userID'].  "';";
// $resultsongtitle = mysqli_query($conn, $querysongtitle);

while ($row = mysqli_fetch_assoc($resultsongtitle)) {
echo '<div class="albumInnerDiv">
<p>'.$row['Title'].' </p>
</div>
<hr>';


}


?>
