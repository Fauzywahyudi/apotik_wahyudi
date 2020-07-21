<?php
include 'koneksi.php';
$pus=mysqli_query($kon,"delete from tbl_user where username='$_GET[user]'");

if ($pus) {
  echo "<script>
  alert('User Berhasil dihapus');
  document.location='damin.php?p=user';
  </script>";
}else {
  echo "<script>
  alert('User Gagal dihapus');
  document.location='damin.php?p=user';
  </script>";
}
 ?>
