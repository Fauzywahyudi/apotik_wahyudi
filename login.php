<div class="login">
  <form name="form1" method="post" action="" enctype="multipart/form-data">
    <input name="username" type="text" id="username" placeholder="Username Anda" autocomplete="off">
      <input name="password" type="password" id="password" placeholder="Password untuk Login">
      <input name="login" type="submit" id="login" value="Login" class="btn btn-edit">
  </form>
</div>


<?php
if(isset($_POST["login"])){
  include "koneksi.php";
  $sqlm = mysqli_query($kon, "select * from tbl_user where username='$_POST[username]' and password=md5('$_POST[password]')");
  $rm = mysqli_fetch_array($sqlm);
  $rowm = mysqli_num_rows($sqlm);
  $sqld = mysqli_query($kon, "select * from tbl_dokter where username='$_POST[username]' and password=md5('$_POST[password]')");
  $rd = mysqli_fetch_array($sqld);
  $rowd = mysqli_num_rows($sqld);
 if($rowm > 0){
  //session_start();
  $_SESSION["user"]=$rm["username"];
  $_SESSION["passuser"]=$rm["password"];
  mysqli_query($kon,"update tbl_user set status=1, lastlogin=NOW() where username='$_SESSION[user]'");
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
}else
if ($rowd > 0) {
  $_SESSION["user"]=$rd["username"];
  $_SESSION["passuser"]=$rd["password"];
  mysqli_query($kon,"update tbl_dokter set status=1, lastlogin=NOW() where username='$_SESSION[user]'");
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=dok.php?p=home'>";
}else {
  echo "Password Salah";
}

}
?>
