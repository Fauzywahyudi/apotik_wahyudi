<?php
include 'koneksi.php';

$sql=mysqli_query($kon,"SELECT * from jadwal_dokter a inner join tbl_dokter b on a.user_dokter=b.username where user_dokter='$_GET[user]'");
$rs=mysqli_fetch_array($sql);
$num=mysqli_num_rows($sql);
?>
<h1>Jadwal <?php echo "$rs[nama] "; ?></h1>
<p></p>

<table  style="border-radius:15px; border:2px solid blue;" width="100%">
  <tr>
            <td colspan="7"><hr color="#5271FF"> </td>
          </tr>
  <tr>
    <th>NO</th>
    <th>Hari</th>
    <th>Jam</th>
  </tr>
  <tr>
            <td colspan="7"><hr color="#5271FF"> </td>
          </tr>
  <?php

  if ($num>0) {
    $no=1;
    $sqlm=mysqli_query($kon,"SELECT * from jadwal_dokter a inner join tbl_dokter b on a.user_dokter=b.username where user_dokter='$_GET[user]'");
    while ($rm=mysqli_fetch_array($sqlm)) {
            $d=substr($rm['tanggal'], 8);
            $m=substr($rm['tanggal'], 5,2);
            $y=substr($rm['tanggal'], 0,4);

      echo "<tr>
        <td align='center'>$no</td>
        <td align='center'>$d-$m-$y</td>
        <td align='center'>$rm[jam_awal] - $rm[jam_akhir]</td>
        ";
      echo " <tr>
            <td colspan=7><hr color='#5271FF'> </td>
          </tr>";

      $no++;
    }
  }else {
    echo "<tr>
    <td colspan='4' align='center'>
    <b>Dokter Belum Menginputkan Jadwal.!!</b>
    </td>
    </tr>
    ";
    echo " <tr>
            <td colspan=7><hr color='#5271FF'> </td>
          </tr>";
  }


?>

</table>
<p></p>
<form class="" action="" method="post">
  <input type="submit" name="kembali" value="Kembali" class="btn btn-back">
</form>

<?php

if (isset($_POST['kembali'])) {


  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=index.php?p=jadwaldokuser'>";
}
 ?>
