<?php
$sqlk = mysqli_query($kon, "select * from komentar where idstatus='$rs[idstatus]' order by tglkomentar asc");
while($rk = mysqli_fetch_array($sqlk)){
	$sqlmk = mysqli_query($kon, "select * from mahasiswa where nobp='$rk[nobp]'");
  $rmk = mysqli_fetch_array($sqlmk);
  if(!empty($rmk["foto"])){
    $fotomk = "foto/$rmk[foto]";
  }else{
    $fotomk = "foto/avatar.png";
  }
  
  echo "<div class='grid'>
  <div class='dh1'><img src='$fotomk' width='100%'></div>
  <div class='dh11'>
  <big><b>$rmk[nama]</b></big><br>
  pada $rk[tglkomentar] WIB <p>
  <big>$rk[komentar]</big>";
  if($_SESSION["nobpmhs"] == $rk["nobp"]){
  echo "<p><a href='aksi.php?p=komendel&idk=$rk[idkomentar]'>Hapus</a>";
  }
  echo "</div>
  </div><p>";
}
?>

<?php 
$sqlm = mysqli_query($kon, "select * from mahasiswa where nobp='$_SESSION[nobpmhs]'");
  $rm = mysqli_fetch_array($sqlm);
  if(!empty($rm["foto"])){
    $foto = "foto/$rm[foto]";
  }else{
    $foto = "foto/avatar.png";
  }
?>
<form name="form1" method="post" action="<?php echo "aksi.php?p=komentar"; ?>">
<div class="dh1">
<br><img src="<?php echo "$foto"; ?>" width="100%">
</div>
<div class="dh11">
  <input type="hidden" name="idstatus" value="<?php echo "$rs[idstatus]"; ?>">
  <textarea name="komentar" id="komentar" placeholder="Masukkan Komentar Anda"></textarea><br>
  <input type="submit" name="Submit" value="Komentar">
</div>
</form>
