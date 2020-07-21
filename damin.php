<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />

<title>Selamat Datang</title>
</head>

<body>
<?php
if(!empty($_SESSION["user"]) and !empty($_SESSION["passmin"])){
  $sqlm = mysqli_query($kon, "select * from admin where id='$_SESSION[user]'");
  $rm = mysqli_fetch_array($sqlm);
?>
<div class="containermenu">
  <div class="grid">
    <div class="dh6">
      <img src="image/logo.png" alt="" id="logo register">
      <!-- <b><font size='5px'>Apotik Wahyudi</font></b>  -->
    </div>
    <div class="dh6" id="nav" align='right' >
	<?php
	echo "<a href='?p=user'>User</a>";
  echo "<a href='?p=dokter'>Dokter</a>";
  echo "<a href='?p=obat'>Obat</a>";
	echo "<a href='?p=profildamin'>$rm[nama]</a> ";
	echo "<a href='?p=logout' id='logout'>Logout</a>";
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
		include "logoutmin.php";
	}else if($_GET["p"] == "profildamin"){
		include "profildamin.php";
	}else if($_GET["p"]=="user"){
		include "user.php";
	}else if($_GET["p"]=="rule"){
		include "rule.php";
	}else if($_GET["p"]=="atursakit"){
		include "atursakit.php";
	}else if($_GET["p"]=="inp_user"){
		include "input_user.php";
	}else if($_GET["p"]=="inp_dokter"){
		include "input_dokter.php";
	}else if($_GET["p"]=="profilmhs"){
		include "profilmhs.php";
	}else if($_GET["p"]=="user_edit"){
		include "useredit.php";
	}else if($_GET["p"]=="dok_edit"){
		include "dokedit.php";
	}else if($_GET["p"]=="obat"){
		include "obat.php";
	}else if($_GET["p"]=="inp_obat"){
		include "input_obat.php";
	}else if($_GET["p"]=="stok_obat"){
		include "stok_obat.php";
	}else if($_GET["p"]=="obat_edit"){
		include "obatedit.php";
	}else if($_GET["p"]=="det_obat"){
		include "det_obat.php";
	}else if($_GET["p"]=="profilmhsmin"){
		include "profilmhsmin.php";
	}else if($_GET["p"]=="pesankirim"){
		include "pesankirim.php";
	}else if($_GET["p"]=="dokter"){
		include "dokter.php";
	}else if($_GET["p"]=="profildokmin"){
		include "profildokmin.php";
	}else if($_GET["p"]=="jadwal_dokmin"){
		include "jadwal_dokmin.php";
	}else if($_GET["p"]=="editjadmin"){
		include "editjadmin.php";
	}else if($_GET["p"]=="pesanan_user"){
		include "pesanan_user.php";
	}else if($_GET["p"]=="detpesanan"){
		include "detpesanan.php";
	}else{
		include "homemin.php";
		}
	?>
	</div>
  </div>
</div>
<div class="container3">
  <div class="grid">
    <div class="dh12"><center>Apotik Wahyudi &copy; 2018</center></div>
  </div>
</div>
<?php
}else{
  include "mimin.php";
}
?>
</body>
</html>
