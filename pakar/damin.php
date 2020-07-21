<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(!empty($_SESSION["min"]) and !empty($_SESSION["passmin"])){
  $sqlm = mysqli_query($kon, "select * from admin where id='$_SESSION[min]'");
  $rm = mysqli_fetch_array($sqlm);
?>
<div class="container3">
  <div class="grid">
    <div class="dh6"> Sistem Pakar Acne Vulgaris</div>
    <div class="dh6" align="right">
	<?php
	echo "<a href='?p=user'>User</a>";
  echo "<a href='?p=rule'>Rule</a>";
  echo "<a href='?p=atursakit'>Penyakit</a>";
	echo "<a href='?p=profildamin'>$rm[nama]</a> ";
	echo "<a href='?p=logout'>Logout</a>";
	?>
	</div>
  </div>
</div>
<div class="container4">
  <div class="grid">
    <div class="dh3"><?php include "kiridamin.php"; ?></div>
    <div class="dh9">
	<?php
	if($_GET["p"] == "logout"){
		include "logout.php";
	}else if($_GET["p"] == "profildamin"){
		include "profildamin.php";
	}else if($_GET["p"]=="user"){
		include "user.php";
	}else if($_GET["p"]=="rule"){
		include "rule.php";
	}else if($_GET["p"]=="atursakit"){
		include "atursakit.php";
	}else{
		include "statusall.php";
		}
	?>
	</div>
  </div>
</div>
<?php
}else{
  include "mimin.php";
}
?>
</body>
</html>
