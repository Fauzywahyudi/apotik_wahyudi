<div class="card">
<?php
if(!empty($rm["foto"])){
	$foto = "foto/$rm[foto]";
}else{
	$foto = "foto/avatar.png";
}
?>
<img src="<?php echo "$foto"; ?>" alt="Avatar" style="width:100%">
<div class="isicard">
<?php
  echo "<h2>$rm[nama]</h2>";
  echo "<p><br>Pekerjaan : <b>$rm[pekerjaan] </b></p>";
?>
<a href="<?php echo "?p=profiledit&user=$rm[username]";?>"><button type="button" class="btn btn-edit">Edit Profil</button></a>
<p></p>
</div>
</div>
<p>
<div align="center">
<a href="<?php echo "?p=antrian"; ?>"><button type="button" class="btn btn-menu">Ambil Antrian</button></a><p></p>
<a href="<?php echo "?p=lihat_obat"; ?>"><button type="button" class="btn btn-menu">Pesan Obat</button></a><p></p>
<?php $sqlp=mysqli_query($kon,"SELECT * from pesanan where username='$_SESSION[user]' and status_pesanan='Belum Diambil'");
$p=mysqli_num_rows($sqlp);
 ?>
<a href="<?php echo "?p=pesanan"; ?>"><button type="button" class="btn btn-menu">Pesanan (<?php echo "$p"; ?>)</button></a> <p></p>
<a href="<?php echo "?p=konsul"; ?>"><button type="button" class="btn btn-menu">Konsultasi Gratis</button></a><p></p>
</div>
<p>
