<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="style.css" />

<title>Selemat Datang Di Apotik Wahyudi</title>
</head>

<body>
<?php
if(!empty($_SESSION["user"]) and !empty($_SESSION["passuser"])){
  $sqlm = mysqli_query($kon, "select * from tbl_user where username='$_SESSION[user]'");
  $rm = mysqli_fetch_array($sqlm);
?>
<div class="containermenu">
  <div class="grid">
    <div class="dh6">
    <img src="image/logo.png" alt="" id="logo register">
    <!-- <b><font size='5px'>Apotik Wahyudi</font></b>  -->
  </div>
    <div class="dh6"  id="nav" align="right">
	<?php
	echo "<a href='?p=beranda' id='men'><b>Beranda</b></a>";
  echo "<a href='?p=keranjang' id='men'><b>Keranjang</b></a>";
	echo "<a href='?p=jadwaldokuser' id='men'><b>Jadwal Dokter</b></a> ";
	echo "<a href='?p=logout' id='logout'><b>Logout</b></a>";
	?>
	</div>
  </div>
</div>
<div class="container4">
  <div class="grid">
    <div class="dh3"><?php include "kiri.php"; ?></div>
    <div class="dh9">
	<?php
	if($_GET["p"] == "logout"){
		include "logout.php";
	}else if($_GET["p"] == "profil"){
		include "profil.php";
	}else if($_GET["p"]=="profiledit"){
		include "profiledit.php";
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
	}else if($_GET["p"]=="keranjang"){
		include "keranjang.php";
	}else if($_GET["p"]=="tambah_keranjang"){
		include "tambah_keranjang.php";
	}else if($_GET["p"]=="beranda"){
		include "homeuser.php";
	}else if($_GET["p"]=="hapus_keranjang"){
		include "hapus_keranjang.php";
	}else if($_GET["p"]=="checkout"){
		include "checkout.php";
	}else if($_GET["p"]=="notice"){
		include "notice.php";
	}else if($_GET["p"]=="pesanan"){
		include "pesanan.php";
	}else if($_GET["p"]=="jadwaldokuser"){
		include "jadwaldokuser.php";
	}else if($_GET["p"]=="waldokser"){
		include "waldokser.php";
	}else if($_GET["p"]=="konsul"){
		include "pakar/sakit.php";
	}else if($_GET["p"]=="konsultasi"){
		include "pakar/konsultasi.php";
	}else if($_GET["p"]=="konsultasifc"){
		include "pakar/konsultasifc.php";
	}else if($_GET["p"]=="hasilkonsultasifc"){
		include "pakar/hasilkonsultasifc.php";
	}else if($_GET["p"]=="hasilkonsultasi"){
		include "pakar/hasilkonsultasi.php";
	}else{
		include "homeuser.php";
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
