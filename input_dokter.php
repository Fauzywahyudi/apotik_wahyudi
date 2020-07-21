
<div class="profil">
  <form class="" action="" method="post">
  <center><h1>Form Input User</h1> </center>
<div class="grid">
<div class="dh6" align='center'>
<b>Username</b> <h3><input type="text" name="username" value="" placeholder="Username"></h3><br>
<b>Password</b> <h3><input type="password" name="password" value="" placeholder="Password"></h3><br>
</div>
<div class="dh6" align='center'>
<b>Nama Lengkap</b><h3><input type="text" name="nama" value="" placeholder="Nama Lengkap Beserta Gelar"></h3><br>
<b>Spesialis</b><h3><input type="text" name="pekerjaan" value="" placeholder="Spesialis"></h3><br>
</div>
<div class="dh12" align='center'>
  <input type="submit" name="simpan" value="Simpan Data" class="btn btn-edit">
  <input type="submit" name="back" value="Kembali" class="btn btn-back">
</div>
<?php
if (isset($_POST['back'])) {

  echo "<META HTTP-EQUIV='Refresh' Content='0.5; URL=damin.php?p=dokter'>";

}
if(isset($_POST["simpan"])){
  include "koneksi.php";
  $sql = mysqli_query($kon, "select * from tbl_user where username='$_POST[username]'");
  $r = mysqli_num_rows($sql);
  if(!empty($_POST["username"]) and !empty($_POST["password"]) and !empty($_POST["nama"]) and !empty($_POST["pekerjaan"])){

  if($r == 0){
  $sqlm = mysqli_query($kon, "insert into tbl_dokter (username, password, nama, pekerjaan, tglreg) values ('$_POST[username]',md5('$_POST[password]') , '$_POST[nama]', '$_POST[pekerjaan]', NOW())");

  if($sqlm){
    echo "<center>Proses Registrasi Berhasil";
  }else{
    echo "<center>Proses Registrasi Gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=dokter'>";
  }else{
    echo "<center>Username $_POST[username] Sudah Terdaftar";
  }

  }else{
    echo "<center>Data Harus Diisi Dengan Lengkap";
  }
}
?>
</div>
</form>
</div>
