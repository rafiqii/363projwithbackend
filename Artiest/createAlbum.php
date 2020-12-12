<?php
include_once 'Header.php';
?>

<div style="border: 2px solid red; width: 400px; margin-left:40%;">
<form action="../include/album-inc.php" method="POST" enctype="multipart/form-data">
<label><span style=" padding-left:30px;">Album Name</span></label>
<input style="margin: 10px;" name="AlbumName" type="text" placeholder="Album Name" required /> <br />

<label><span style=" padding-left:30px;">album Description</span></label>
<input style="margin: 10px;" name="albumDescription" type="text" placeholder="album Description" required /> <br />



<button type="submit" name="submit" >sup</button>


</form>
</div>



</body>
</html>
