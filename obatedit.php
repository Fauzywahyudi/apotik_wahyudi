<?php include 'koneksi.php';
$sql=mysqli_query($kon, "select * from tbl_obat where kd_obat='$_GET[kd]'");
$rm=mysqli_fetch_array($sql);
?>
<div class="profil">
  <form class="" action="" method="post" enctype="multipart/form-data">
  <center><h1>Form Input Obat</h1> </center>
<div class="grid">
<div class="dh6" align='center'>
<b>Kode Obat</b><br>  <input type="text" name="kd_obat" value="<?php echo "$rm[kd_obat]"; ?>" placeholder="Kode Obat" disabled><br><br>
<input type="hidden" name="kd_obat" value="<?php echo "$rm[kd_obat]"; ?>" placeholder="Kode Obat">
<b>Nama Obat</b><br>  <input type="text" name="nm_obat" value="<?php echo "$rm[nm_obat]"; ?>" placeholder="Nama Obat"><br><br>
<b>Harga Obat</b><br>  <input type="text" name="harga" value="<?php echo "$rm[harga]"; ?>" placeholder="Harga Obat"><br><br>
<b>Foto Obat</b><br>  <input type="file" name="foto" value="<?php echo "$rm[foto]"; ?>" placeholder=""><br><br>
</div>
<div class="dh6" align='center'>
<b>Jenis Obat</b><br> <input type="text" name="jenis" value="<?php echo "$rm[jenis_obat]"; ?>" placeholder="Jenis Obat"><br><br>
<b>Satuan</b><br> <input type="text" name="satuan" value="<?php echo "$rm[satuan]"; ?>" placeholder="Satuan"><br><br>
<b>Tanggal Kadaluarsa Obat</b><br>  <input type="date" name="tgl_kadaluarsa" value="<?php echo "$rm[tgl_kadaluarsa]"; ?>" placeholder=""><br><br>
<b>Keterangan</b><br>   <textarea name="ket" rows="3" cols="40" value="<?php echo "$rm[ket]"; ?>" ></textarea><br><br>
</div>
<div class="dh10" align='center'>
  <input type="submit" name="simpan" value="Simpan Data" class="btn btn-edit">
  <input type="submit" name="back" value="Kembali" class="btn btn-back">
</div>

<?php

if (isset($_POST['back'])) {
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=damin.php?p=det_obat&kd=$rm[kd_obat]'>";
}
if(isset($_POST["simpan"])){
  include "koneksi.php";

  $nmfoto  = $_FILES["foto"]["name"];
  $lokfoto = $_FILES["foto"]["tmp_name"];
  if(!empty($lokfoto)){
   move_uploaded_file($lokfoto, "obat/$nmfoto");
   $foto = ", foto='$nmfoto'";
  }else{
   $foto = "";
  }

  $sqlm = mysqli_query($kon, "UPDATE tbl_obat SET nm_obat='$_POST[nm_obat]', harga='$_POST[harga]', jenis_obat='$_POST[jenis]', satuan='$_POST[satuan]', ket='$_POST[ket]', tgl_kadaluarsa='$_POST[tgl_kadaluarsa]' $foto WHERE kd_obat='$rm[kd_obat]'");

  if($sqlm){
    echo "
    <script>
    alert('Proses Edit Obat Berhasil')
    </script>";
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=damin.php?p=det_obat&kd=$rm[kd_obat]'>";

  }else{
    echo "<center>Proses Registrasi Gagal";
  }

}
?>
</div>
</form>
</div>
