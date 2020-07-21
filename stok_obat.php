<?php
include 'koneksi.php';
$sql=mysqli_query($kon,"select * from tbl_obat where kd_obat='$_GET[kd]'");
$rm=mysqli_fetch_array($sql);

 ?>
 <div class="dh12">
   <h1>Input Stok Obat</h1>
 </div>
 <div class="dh2">
   <div class="dh12">
     <b><h3>Nama Obat</h3></b> <br>
   </div>
   <div class="dh12">
     <b><h3>Stok Obat</h3></b> <br>
   </div>
   <div class="dh12">
     <b><h3>Tambah Obat</h3></b> <br>
   </div>


 </div>
 <div class="dh3">
   <?php
   echo "<div class='dh12'>
   <b><h3>: $rm[nm_obat]</h3></b><br>
   </div>
   ";
   echo "<div class='dh12'>
   <b><h3>: $rm[stok]</h3></b><br>
   </div>
   ";
    ?>
    <div class="dh12">
      <br>
      <form class="" action="" method="post">
        <input type="number" name="stok" value=""><br><br>
        <input type="submit" name="tambah" value="Tambah" class="btn btn-edit">
      </form>
      <?php
      if (isset($_POST['tambah'])) {
        if (!empty($_POST['stok'])) {
          $stok_awal=$rm['stok'];
          $stok_akhir=$stok_awal+$_POST['stok'];

          $update=mysqli_query($kon,"update tbl_obat set stok='$stok_akhir' where kd_obat='$rm[kd_obat]'");
          if ($update) {
            echo "<script>
            alert('Stok Berhasil Ditambahkan');
            </script>";
            echo "<META HTTP-EQUIV='Refresh' Content='0.5; URL=damin.php?p=det_obat&kd=$rm[kd_obat]'>";
          }else {
            echo "<script>
            alert('Stok Gagal Ditambahkan');
            </script>";
          }
        }else {
          echo "Masukkan Jumlah Stok!";
        }
      }
       ?>
    </div>

 </div>
 <div class="dh4">
   <a href="<?php echo "damin.php?p=det_obat&kd=$rm[kd_obat]"; ?>"><button type="button" name="button" class="btn btn-back">Kembali</button> </a>
 </div>
<p> </p>
