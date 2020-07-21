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
<a href="<?php echo "?p=profileditdok&user=$rm[username]";?>"><button type="button" class="btn btn-edit">Edit Profil</button></a>
<p></p>
</div>
</div>
<p>
<div align="center">
<a href="<?php echo "?p=profil"; ?>"><button type="button" class="btn btn-menu">Lihat Informasi</button></a><p></p>

</div>
<p>
