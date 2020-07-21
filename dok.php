<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />

<title>Selemat Datang Di Apotik Wahyudi Dokter</title>
</head>

<body>
<?php
if(!empty($_SESSION["user"]) and !empty($_SESSION["passuser"])){
  $sqlm = mysqli_query($kon, "select * from tbl_dokter where username='$_SESSION[user]'");
  $rm = mysqli_fetch_array($sqlm);
?>
<div class="containermenu">
  <div class="grid">
    <div class="dh6">
      <img src="image/logo.png" alt="" id="logo register">
      <!-- <b><font size='5px'>Apotik Wahyudi</font></b>  -->
    </div>
    <div class="dh6" id="nav" align="right">
	<?php
	echo "<a href='?p=beranda'><b>Beranda</b></a>";
	echo "<a href='?p=atur_antri'><b>Atur Antrian</b></a>";
  echo "<a href='?p=atur_jadwal'><b>Atur Jadwal</b></a>";
	echo "<a href='?p=logout' id='logout'><b>Logout</b></a>";
	?>
	</div>
  </div>
</div>
<div class="container4">
  <div class="grid">
    <div class="dh3"><?php include "kiridok.php"; ?></div>
    <div class="dh9">
	<?php
	if($_GET["p"] == "logout"){
		include "logoutdok.php";
	}else if($_GET["p"] == "profil"){
		include "profildok.php";
	}else if($_GET["p"]=="profileditdok"){
		include "profileditdok.php";
	}else if($_GET["p"]=="status"){
		include "status.php";
	}else if($_GET["p"]=="profilmhs"){
		include "profilmhs.php";
	}else if($_GET["p"]=="pesankirim"){
		include "pesankirim.php";
	}else if($_GET["p"]=="lihat_obat"){
		include "lihat_obat.php";
	}else if($_GET["p"]=="antrian"){
		include "antrian.php";
	}else if($_GET["p"]=="keranjang"){
		include "keranjang.php";
	}else if($_GET["p"]=="det_obatuser"){
		include "det_obatuser.php";
	}else if($_GET["p"]=="atur_jadwal"){
		include "atur_jadwal.php";
	}else if($_GET["p"]=="editjad"){
		include "editjad.php";
	}else if($_GET["p"]=="home"){
		include "homedok.php";
	}else if($_GET["p"]=="atur_antri"){
		include "atur_antri.php";
	}else{
		include "homedok.php";
		}
	?>
	</div>

    <!-- <div class="dh3"><?php //include "useronline.php"; ?></div> -->
  </div>
</div>

<div class="container3">
  <div class="grid">
    <div class="dh12"><center>Apotik Wahyudi &copy; 2018</center></div>
  </div>
</div>
<?php
}else{
  include "home.php";
}
?>
</body>
</html>
