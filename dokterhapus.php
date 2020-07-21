<?php
include 'koneksi.php';
$pus=mysqli_query($kon,"delete from tbl_dokter where username='$_GET[user]'");

if ($pus) {
  echo "<script>
  alert('Dokter Berhasil dihapus');
  document.location='damin.php?p=dokter';
  </script>";
}else {
  echo "<script>
  alert('Dokter Gagal dihapus');
  document.location='damin.php?p=dokter';
  </script>";
}
 ?>
