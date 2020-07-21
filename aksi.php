<?php
session_start();
include "koneksi.php";

$sqlm = mysqli_query($kon, "select * from tbl_user where username='$_SESSION[user]'");
$rm = mysqli_fetch_array($sqlm);

if($_GET["p"] == "statusupdate"){
  if(!empty($_POST["status"])){
  mysqli_query($kon, "insert into status (nobp, status, tglpost) values ('$rm[nobp]', '$_POST[status]', NOW())");
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=index.php?p=status'>";
}else if($_GET["p"] == "komentar"){
  if(!empty($_POST["komentar"])){
  mysqli_query($kon, "insert into komentar (idstatus, nobp, komentar, tglkomentar) values ('$_POST[idstatus]', '$rm[nobp]', '$_POST[komentar]', NOW())");
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=index.php?p=status'>";
}else if($_GET["p"] == "komendel"){
 mysqli_query($kon, "delete from komentar where idkomentar='$_GET[idk]'");
 	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=index.php?p=beranda'>";
}else if($_GET["p"] == "kirimpesan"){
   mysqli_query($kon, "insert into pesan (nobpdari,nobpke,pesan,tglkirim) values ('$_POST[nobpdari]','$_POST[nobpke]','$_POST[pesan]',NOW())");
   	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=index.php?p=profilmhs&nobp=$_POST[nobpke]'>";
}

?>
