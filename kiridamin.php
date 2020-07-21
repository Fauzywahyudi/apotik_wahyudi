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
	<p></p>
<?php
  echo "<h4>$rm[nama]</h4>";
  echo "<p><br>Pekerjaan : Admin</p>";
?>
<a href="<?php echo "?p=profildamin"?>"><button type="button" class="btn btn-edit">Edit Profil</button></a>
<p></p>
</div>
</div>
<p>
	<?php 
	$sql=mysqli_query($kon,"SELECT * from pesanan where status_pesanan='Belum Diambil'");
	$row=mysqli_num_rows($sql);
	 ?>
<div align="center">
<a href="<?php echo "?p=pesanan_user"; ?>"><button type="button" class="btn btn-menu">Pesanan (<?php echo "$row"; ?>)</button></a> <p></p>
<a href="<?php echo "aksimin.php?p=resetantri";?>"><button type="button" class="btn btn-menu">Reset Antrian</button></a>
</div>
<p>
