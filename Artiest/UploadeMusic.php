<?php

include_once 'Header.php';
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
    xmlhttp.open("GET", "getSongs.php?q=" + str, true);
    xmlhttp.send();
  }
</script>
<form action="../include/UploadeMusic-inc.php" method="POST" enctype="multipart/form-data">
  <label><span style=" padding-left:30px;">Title</span></label>
  <input style="margin: 10px;" name="Title" type="text" placeholder="Enter username" required /> <br />


  <select name="albumID">
    <?php

    $sql = mysqli_query($conn, "SELECT  albumID , albumname FROM albums WHERE artiestID ='" . $_SESSION['userID'] . "'");
    echo '<option value="-1"> select a course </option>';

    while ($row = $sql->fetch_assoc()) {

      unset($aid, $aName);
      $aid = $row['albumID'];
      $aName = $row['albumname'];

      echo '<option value="' . $aid . '">' . $aName . '</option>';
    }

    ?>
  </select>


  <input type="file" name="file"> <br>

  <button type="submit" name="submit">uploade</button>


</form>

<div id="txtHint" class="col-sm-10">
  <p class="lead">
  </p>
</div>

<form>

  <select class="form-select" size="5" aria-label="size 3 select example" id="songs" name="songs" onchange="showUser(this.value)">
    <?php
    $sql = mysqli_query($conn, "SELECT  Title , songID FROM songs WHERE artiestID ='" . $_SESSION['userID'] . "'");
    echo '  <option value=-1>Open this select menu</option>';
    while ($row = $sql->fetch_assoc()) {
      unset($Title, $SongFile);
      $Title = $row['Title'];
      $songID = $row['songID'];
      echo '<option value="' . $songID . '">' . $Title . '</option>';
    }
    ?>
  </select>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>

</form>

<button type="submit" id="favourite"> fav </button>
<script>
  $('#favourite').click(function() {
    var e = document.getElementById("songs");
    var selectedID = e.options[e.selectedIndex].value;
    var jsonData = JSON.stringify(selectedID);
    $.ajax({
      type: "POST",
      url: 'favourites-inc.php',
      data: {
        data: jsonData
      },
      success: function(data) {}
    });
  });
</script>

</body>


</html>