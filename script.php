<?php

session_start();
require_once 'include/DBconnector-inc.php';

$id = json_decode($_POST['data']);
$query = "SELECT  Title , songID FROM songs WHERE albumID = '" . $id . "' ";
$sql = mysqli_query($conn, $query);
echo '    <select class="form-select" size="5" aria-label="size 3 select example" id="songs" name="songs" onchange="showUser(this.value)" >
 <option value=-1>Select song</option>';
while ($row = $sql->fetch_assoc()) {
    unset($Title, $SongFile);
    $Title = $row['Title'];
    $songID = $row['songID'];
    echo '<option value="' . $songID . '">' . $Title . '</option>';
}
echo "</select>";
