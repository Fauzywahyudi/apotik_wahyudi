<div id="register">
<fieldset>
<h3>Ingin Membeli Obat dan Konsultasi?<br> Register disini !</h3>
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <input name="username" type="text" id="username" placeholder="Username Anda" autocomplete="off">
    <input name="password" type="password" id="password" placeholder="Password untuk Login" autocomplete="off">
    <input name="nama" type="text" id="nama" placeholder="Nama Lengkap Anda" autocomplete="off">
    <input name="pekerjaan" type="text" id="pekerjaan" placeholder="Pekerjaan" autocomplete="off"> <br><br>
    <input name="simpan" type="submit" id="simpan" value="Daftar" class="btn btn-edit">
</form>
<p></p>
<?php
if(isset($_POST["simpan"])){
  include "koneksi.php";
  $sql = mysqli_query($kon, "select * from tbl_user where username='$_POST[username]'");
  $r = mysqli_num_rows($sql);
  if(!empty($_POST["username"]) and !empty($_POST["password"]) and !empty($_POST["nama"]) and !empty($_POST["pekerjaan"])){

  if($r == 0){
  $sqlm = mysqli_query($kon, "insert into tbl_user (username, password, nama, pekerjaan, tglreg) values ('$_POST[username]', md5('$_POST[password]'), '$_POST[nama]', '$_POST[pekerjaan]', NOW())");

  if($sqlm){
    echo "Proses Registrasi Berhasil";
  }else{
    echo "Proses Registrasi Gagal";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=home'>";
  }else{
    echo "Username $_POST[username] Sudah Terdaftar";
  }

  }else{
    echo "Data Harus Diisi Dengan Lengkap";
  }
}
?>
</fieldset>
</div>
