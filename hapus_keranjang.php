<?php include 'koneksi.php';

mysqli_query($kon,"DELETE FROM keranjang WHERE kd_obat='$_GET[kd]' AND username='$_SESSION[user]' and status='Belum'");
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=index.php?p=keranjang'>";

?>
