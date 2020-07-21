<?php
$sqlfrom=mysqli_query($kon, "select * from mahasiswa where nobp='$_SESSION[nobpmhs]'");
$rfrom=mysqli_fetch_array($sqlfrom);
$sqlto=mysqli_query($kon, "select * from mahasiswa where nobp='$_GET[nobp]'");
$rto=mysqli_fetch_array($sqlto);


 ?>
<big><b>Pesan ke </b></big>
<form class="" action="<?php echo "aksi.php?p=kirimpesan"; ?>" method="post">
  <input type="hidden" name="nobpdari" value="<?php echo "$rfrom[nobp]"; ?>">
  <input type="hidden" name="nobpke" value="<?php echo "$rto[nobp]"; ?>">
  <input type="text" name="ke" value="<?php echo "$rto[nama]"; ?>" disabled>
  <textarea name="pesan" rows="8" cols="80" placeholder="Tulis Pesan"></textarea> <br>
  <input type="submit" name="submit" value="Kirim">
</form>
