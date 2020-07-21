<?php
$sqlm = mysqli_query($kon, "delete from mahasiswa where id='$_GET[idm]'");

if($sqlm){
    echo "Data Mahasiswa Berhasil Dihapus";
  }else{
    echo "Gagal Menghapus";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='3; URL=?p=mhs'>";
?>