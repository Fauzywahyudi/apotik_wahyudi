<?php
include 'koneksi.php';
 ?>
<div class="profil">
<center><h1>Atur Jadwal</h1></center>

<?php

$show=1;

if (isset($_POST['tambah'])) {

  echo "<h2><u>Input Jadwal</u></h2>";
  echo "<form method='post'>
  <h3>Tanggal : </h3>
  <input type='date' name='hari' >
  <br>
  <h3>Jam Mulai : </h3>
  <input type='time' name='jam_awal' >
  <br>
  <h3>Jam Akhir : </h3>
  <input type='time' name='jam_akhir' >
  <br>
  <p>
  <input type='submit' name='simpan_jadwal' value='Simpan' class='btn btn-edit'>

  <input type='submit' name='kembali' value='Kembali' class='btn btn-back'>


  </form>
  ";
$show=0;

}

if (isset($_POST['simpan_jadwal'])) {

  if (!empty($_POST['hari']) and !empty($_POST['jam_awal']) and !empty($_POST['jam_akhir'])) {
      $ins=mysqli_query($kon, "insert into jadwal_dokter (kd_jadwal, user_dokter, tanggal, jam_awal, jam_akhir) values (null,'$_SESSION[user]','$_POST[hari]','$_POST[jam_awal]','$_POST[jam_akhir]')");
      echo "<META HTTP-EQUIV='Refresh' Content='1; URL=dok.php?p=atur_jadwal'>";
  }else {
    echo "Data Tidak Boleh Kosong..!!";
  }

$show=1;
}

if (isset($_POST['kembali'])) {
  $show=1;
}
 ?>

<?php if ($show==1) {

  ?>
  <form class="" action="" method="post">
    <input type="submit" name="tambah" value="Tambah" class="btn btn-edit">
  </form>
  <p></p>

  <table border="1px" style="border-radius:15px; border:2px solid blue;">
    <tr>
      <th>NO</th>
      <th>Hari</th>
      <th>Jam</th>
      <th>Aksi</th>
    </tr>
    <?php
    $no=1;
    $sql=mysqli_query($kon, "select * from jadwal_dokter where user_dokter='$_SESSION[user]'");
    while ($rm=mysqli_fetch_array($sql)) {
            $d=substr($rm['tanggal'], 8);
            $m=substr($rm['tanggal'], 5,2);
            $y=substr($rm['tanggal'], 0,4);
      echo "<tr>
        <td>$no</td>
        <td>$d-$m-$y</td>
        <td>$rm[jam_awal] - $rm[jam_akhir]</td>
        <td><a href='dok.php?p=editjad&user=$rm[user_dokter]&kd=$rm[kd_jadwal]'><button type='button' class='btn btn-edit'>Detail</button></a>
        </td>
      </tr>";

      $no++;
    }



     ?>


  </table>

  <?php
} ?>



</div>
