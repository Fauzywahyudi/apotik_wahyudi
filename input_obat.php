<div class="profil">
  <form class="" action="" method="post" enctype="multipart/form-data">
  <center><h1>Form Input Obat</h1> </center>
<div class="grid">
<div class="dh6" align='center'>
<b>Kode Obat</b><br>  <input type="text" name="kd_obat" value="" placeholder="Kode Obat"><br><br>
<b>Nama Obat</b><br>  <input type="text" name="nm_obat" value="" placeholder="Nama Obat"><br><br>
<b>Harga Obat</b><br>  <input type="text" name="harga" value="" placeholder="Harga Obat"><br><br>
<b>Foto Obat</b><br>  <input type="file" name="foto" value="" placeholder=""><br><br>
</div>
<div class="dh6" align='center'>
<b>Jenis Obat</b><br> <input type="text" name="jenis" value="" placeholder="Jenis Obat"><br><br>
<b>Satuan</b><br> <input type="text" name="satuan" value="" placeholder="Satuan"><br><br>
<b>Tanggal Kadaluarsa Obat</b><br>  <input type="date" name="tgl_kadaluarsa" value="" placeholder=""><br><br>
<b>Keterangan</b><br>   <textarea name="ket" rows="3" cols="40"  ></textarea><br><br>
</div>
<div class="dh10" align='center'>
  <input type="submit" name="simpan" value="Simpan Data" class="btn btn-edit">
  <input type="submit" name="back" value="Kembali" class="btn btn-back">
  <?php
  if (isset($_POST['back'])) {
    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=damin.php?p=obat'>";
  }
  if(isset($_POST["simpan"])){
    include "koneksi.php";

    $nmfoto  = $_FILES["foto"]["name"];
    $lokfoto = $_FILES["foto"]["tmp_name"];
    if(!empty($lokfoto)){
     move_uploaded_file($lokfoto, "obat/$nmfoto");
     $foto = ", '$nmfoto'";
    }else{
     $foto = ",null";
    }
    $sql = mysqli_query($kon, "select * from tbl_obat where kd_obat='$_POST[kd_obat]'");
    $r = mysqli_num_rows($sql);
    if(!empty($_POST["kd_obat"]) and !empty($_POST["nm_obat"]) and !empty($_POST["harga"]) and !empty($_POST["jenis"]) and !empty($_POST["satuan"]) and !empty($_POST["tgl_kadaluarsa"])){

    if($r == 0){
    $sqlm = mysqli_query($kon, "insert into tbl_obat (kd_obat, nm_obat, harga,stok, jenis_obat, satuan, ket, tgl_kadaluarsa, foto) values ('$_POST[kd_obat]', '$_POST[nm_obat]', '$_POST[harga]', 0,'$_POST[jenis]', '$_POST[satuan]','$_POST[ket]','$_POST[tgl_kadaluarsa]' $foto )");

    if($sqlm){
      echo "<script>
      alert('Proses Pendaftaran Obat berhasil');
      </script>";
      echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=obat'>";

    }else{
      echo "<script>
      alert('Gagal Menyimpan');
      </script>";
    }
  }else{

    echo "<center>Kode Obat $_POST[kd_obat] Sudah Terdaftar";
    }

    }else{

      echo "<center>Data Obat Harus Diisi Dengan Lengkap";
    }
  }
  ?>
</div>




</div>
</form>
</div>
