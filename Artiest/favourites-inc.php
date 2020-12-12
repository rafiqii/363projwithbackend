<?php

session_start();
require_once '../include/DBconnector-inc.php';

$song_ID = json_decode($_POST['data']);
if($song_ID != -1){
$sql = 'INSERT INTO favourites (songID , userID ) VALUES ("' . $song_ID . '", "' . $_SESSION['userID'] . '");';

if ($conn->query($sql) == true) {
    header("location:UploadeMusic.php?error=none");
} else {
    header("location:UploadeMusic.php?error=alot");

}
mysqli_close($conn);
}


?>
</body>
</html>
