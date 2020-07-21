<?php
  //session_start();
  session_destroy();

  //mysqli_query($kon,"update mahasiswa set status=0, lastlogin=NOW() where nobp='$_SESSION[username]'");
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=damin.php'>";
?>
