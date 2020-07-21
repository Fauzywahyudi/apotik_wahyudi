<?php include 'koneksi.php';
$sql=mysqli_query($kon, "select * from jadwal_dokter where user_dokter='$_GET[user]' and kd_jadwal='$_GET[kd]'");
$rm=mysqli_fetch_array($sql);
 ?>

<h2><u>Edit Jadwal</u></h2>
<form method='post'>
<h3>Tanggal : </h3>
<input type='date' name='hari' value="<?php echo "$rm[tanggal]" ?>">
<br>
<h3>Jam Mulai : </h3>
<input type='time' name='jam_awal'value="<?php echo "$rm[jam_awal]"; ?>" >
<br>
<h3>Jam Akhir : </h3>
<input type='time' name='jam_akhir' value="<?php echo "$rm[jam_akhir]"; ?>">
<br>
<p>
<input type='submit' name='edit' value='Simpan' class='btn btn-edit'>

<input type='submit' name='kembali' value='Kembali' class='btn btn-back'>

<input type="submit" name="hapus" value="Hapus" class='btn btn-hapus'>


</form>

<?php
if (isset($_POST['kembali'])) {

  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=dok.php?p=atur_jadwal'>";
}
if (isset($_POST['hapus'])) {
  mysqli_query($kon,"delete from jadwal_dokter where user_dokter='$rm[user_dokter]' and kd_jadwal='$_GET[kd]'");
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=dok.php?p=atur_jadwal'>";
}
if (isset($_POST['edit'])) {
  mysqli_query($kon,"update jadwal_dokter set tanggal='$_POST[hari]', jam_awal='$_POST[jam_awal]', jam_akhir='$_POST[jam_akhir]' where kd_jadwal='$_GET[kd]'");
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=dok.php?p=atur_jadwal'>";
}

 ?>
