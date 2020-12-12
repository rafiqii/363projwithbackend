<?php

session_start();
require_once '../include/DBconnector-inc.php';

$q = intval($_GET['q']);
$sql = "SELECT  Title , SongFile FROM songs WHERE songID = '" . $q . "'";
$result = mysqli_query($conn, $sql);
if ($q == -1) {
    echo "<p class='lead'>
 Select a Song
</p>";}

while ($row = mysqli_fetch_array($result)) {
    echo '<p>' . $row['Title'] . '</p>
    <audio controls class="audio controls">
    <source src="media/' . $row['SongFile'] . '"type="audio/mpeg">
    Your browser does not support the audio element.
    </audio>';
}
;
mysqli_close($conn);
?>
</body>
</html>
