<?php
$sql=mysqli_query($kon, "select * from tbl_obat where kd_obat='$_GET[kd]'");
$rm=mysqli_fetch_array($sql);
 ?>
<div class="profil">
<div class="grid">
<div class="dh6">

    <?php
    if(!empty($rm["foto"])){
    	$foto = "obat/$rm[foto]";
    }else{
    	$foto = "obat/obat.png";
    }
    ?>
    <img src="<?php echo "$foto"; ?>" alt="Avatar" style="width:100%">


</div>
<div class="dh6">
  <h2>Informasi Obat</h2>
  Kode Obat <h3><?php echo "$rm[kd_obat]"; ?></h3>
  Nama Obat <h3><?php echo "$rm[nm_obat]"; ?></h3>
  Harga <h3><?php echo "$rm[harga] / $rm[satuan]" ; ?></h3>
  Jenis Obat <h3><?php echo "$rm[jenis_obat]"; ?></h3>
  Stok <h3><?php echo "$rm[stok]"; ?></h3>

  <div class="dh2" align=left>
    <?php
    echo "<a href='?p=tambah_keranjang&kd=$rm[kd_obat]' ><img src='image/keranjang.jpg' width=40px height=30px style='border:2px solid #5271FF'> </button></a>"; ?>
  </div>
  <div class="dh3" align=left>
    <a href='<?php echo "index.php?p=lihat_obat"; ?>'><button type='button' class="btn btn-back">Kembali</button></a>
  </div>

  <?php
  if (isset($_POST['tambah'])) {
      echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=tambah_keranjang&kd=$rm[kd_obat]'>";
}

   ?>
</div>

</div>
</div>
<p>
<div class="profil">
<div class="grid">

<div class="dh12">
  <?php
  if ($rm['ket']==null) {
    echo "
 <h2>Deskripsi :</h2> <h3> Deskripsi belum dituliskan</h3>";
}else {
  echo "
<h2>Deskripsi :</h2> <h3> $rm[ket]</h3>";
}
   ?>

</div>
</div>
</div>
<p>
