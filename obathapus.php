<?php
include 'koneksi.php';
$pus=mysqli_query($kon,"delete from tbl_obat where kd_obat='$_GET[kd]'");

if ($pus) {
  echo "<script>
  alert('Obat Berhasil dihapus');
  document.location='damin.php?p=obat';
  </script>";
}else {
  echo "<script>
  alert('Obat Gagal dihapus');
  document.location='damin.php?p=obat';
  </script>";
}
 ?>
