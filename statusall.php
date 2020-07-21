<?php
$sqls = mysqli_query($kon, "select * from status order by tglpost desc");
while($rs = mysqli_fetch_array($sqls)){
  $sqlm = mysqli_query($kon, "select * from mahasiswa where nobp='$rs[nobp]'");
  $rm = mysqli_fetch_array($sqlm);
  if(!empty($rm["foto"])){
    $foto = "foto/$rm[foto]";
  }else{
    $foto = "foto/avatar.png";
  }
  
  echo "<div class='grid'>
  <div class='dh2'><img src='$foto' width='100%'></div>
  <div class='dh10'>
  <big><b>$rm[nama]</b></big><br>
  pada $rs[tglpost] WIB <p>
  <big>$rs[status]</big>";
  include "komentar.php";
  echo "</div>
  </div><p>";
}
?>