<?php
  //session_start();
  session_destroy();

  mysqli_query($kon,"update tbl_user set status=0, lastlogin=NOW() where username='$_SESSION[user]'");
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=home'>";
?>
