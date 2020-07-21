<?php
session_start();
include "koneksi.php";


if($_GET["p"] == "resetantri"){
 mysqli_query($kon,"TRUNCATE table antrian");
 echo "<script>
 alert('Antrian Sudah Direset');
 </script>";
 echo "<META HTTP-EQUIV='Refresh' Content='1; URL=damin.php?p=dokter'>";
}
else if($_GET["p"] == "batalpesanan"){
 mysqli_query($kon,"UPDATE pesanan set status_pesanan='Dibatalkan' where id_pesanan='$_GET[id]'");
 $sqlb=mysqli_query($kon,"SELECT * FROM keranjang a inner join tbl_obat b on a.kd_obat=b.kd_obat where id_pesanan='$_GET[id]'");
	 while ($rb=mysqli_fetch_array($sqlb)) {
	 	$jml=$rb['jumlah'];
	 	$stok=$rb['stok'];
	 	$tambah=$stok+$jml;
	 	mysqli_query($kon,"UPDATE tbl_obat set stok='$tambah' where kd_obat='$rb[kd_obat]'");

	 }
 echo "<script>
 alert('Pesanan Sudah DiBatalkan');
 </script>";
 echo "<META HTTP-EQUIV='Refresh' Content='1; URL=damin.php?p=pesanan_user'>";
}else if($_GET["p"] == "pembayaran_pesanan"){
 mysqli_query($kon,"UPDATE pesanan set status_pesanan='Sudah Diambil',tgl_diambil=NOW() where id_pesanan='$_GET[id]'");
 
 echo "<script>
 alert('Pesanan Sudah dibayar');
 </script>";
 echo "<META HTTP-EQUIV='Refresh' Content='1; URL=damin.php?p=pesanan_user'>";
}

?>
