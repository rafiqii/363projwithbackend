<?php
require_once 'DBconnector-inc.php';

$queryUserID=
'
select userID
from users
where Type=2;
';
$resultID= mysqli_query($conn, $queryUserID);
/////
while($rowID=mysqli_fetch_assoc($resultID)){

    $queryUserName=
    '
    select UserName
    from users
    where userID= '. $rowID["userID"].';';
    $resultUserName=mysqli_query($conn,$queryUserName);
    $rowUserName=mysqli_fetch_assoc($resultUserName);

    
    $queryArtistProfile=
    '
    select pictureFile
    from profilepicture
    where artiestID='.$rowID["userID"].';';
    $resultArtistProfile=mysqli_query($conn,$queryArtistProfile);
    $rowArtistProfile=mysqli_fetch_assoc($resultArtistProfile);


    echo '
    <div class="song">
    <a href="Artist.php?userID='.$rowID["userID"].'">
    <img alt="'.$rowUserName["UserName"].'" src="Pictures/pp'.$rowArtistProfile['pictureFile'].'.jpg" class="singer">
    '.$rowUserName["UserName"].'
    
    </a>';
}
?>
